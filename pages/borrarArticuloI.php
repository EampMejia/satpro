<?php

session_start();
require("../php/connection.php");

 ?>
<?php
// include database connection
$obj = new ConectionDB();
$con = $obj->dbConnect;
$Bodega="";

try{

    $con = new PDO($dsn, $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (Exception $ex) {

    echo 'No se pudo conectar a la base de datos '.$ex->getMessage();
}

try {

    // get record ID
    // isset() is a PHP function used to verify if a value is there or not
    $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
    // $query = "SELECT NombreBodega from tbl_articulo as a inner join tbl_bodega as b on a.IdBodega=b.IdBodega where IdArticulo = ? ";
    $query = "SELECT b.NombreBodega FROM tbl_articuloInternet as II inner join tbl_bodega as b on II.IdBodega=b.IdBodega where II.IdArticulo= ?";
     $stmt = $con->prepare($query);
     $stmt->bindParam(1, $id);
     $stmt->execute();
     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

     $Bodega = "";
     foreach ($result as $key)
     {
       $Bodega = $key['NombreBodega'];

     }
    $query = "DELETE FROM tbl_articuloInternet WHERE IdArticulo = ?";
     $stmt = $con->prepare($query);
     $stmt->bindParam(1, $id);
    if($stmt->execute())
    {
        header('Location: inventarioInternet.php?status=Eliminado&bodega='.$Bodega );

    }else{
        header('Location: inventarioInternet.php?status=failed&bodega='.$Bodega);
    }
}

// show error
catch(PDOException $exception){
    header('Location: inventarioInternet.php?status=failed&bodega='.$Bodega);
}
?>
