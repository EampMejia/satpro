<?php

require_once("../../../php/config.php");

$host = DB_HOST;
$user = DB_USER;
$password = DB_PASSWORD;
$database = DB_NAME;

$mysqli = new mysqli($host, $user, $password, $database);

$salida = "";
$query = "SELECT idOrdenTrabajo, codigoCliente, nombreCliente, fechaOrdenTrabajo, observaciones FROM tbl_ordenes_trabajo ORDER BY idOrdenTrabajo LIMIT 0";
 if (isset($_POST['consulta'])) {
 	$q = $mysqli->real_escape_string($_POST['consulta']);
	$query = "SELECT idOrdenTrabajo, codigoCliente, nombreCliente, fechaOrdenTrabajo, observaciones FROM tbl_ordenes_trabajo
	WHERE idOrdenTrabajo LIKE '%".$q."%' OR codigoCliente LIKE '%".$q."%' OR nombreCliente LIKE '%".$q."%' OR fechaOrdenTrabajo LIKE '%".$q."%' OR observaciones LIKE '%".$q."%' LIMIT 5";
 }

 $resultado = $mysqli->query($query);

 if ($resultado->num_rows > 0) {
 	$salida.="<br><table class='table table-striped table-responsive'>
			    <thead>
					<tr class='active'>
						<th>#Orden</th>
						<th>CODIGO CLIENTE</th>
						<th>NOMBRE</th>
                        <th>FECHA ORDEN</th>
                        <th>OBSERVACIONES</th>
					</tr>
				</thead>
				<tbody>";
	while ($fila = $resultado->fetch_assoc()) {
		$salida.= "<tr>
			<td>"."<a class='btn btn-primary btn-sm' href=ordenTrabajo.php?nOrden={$fila['idOrdenTrabajo']}>".$fila['idOrdenTrabajo']."<a></td>
			<td>".$fila['codigoCliente']."</td>
			<td>".$fila['nombreCliente']."</td>
            <td>".$fila['fechaOrdenTrabajo']."</td>
            <td>".$fila['observaciones']."</td>
		</tr>";
	}
	$salida.="</tbody></table>";
}else {
	$salida.="No se encontraron coincidencias";
}
echo $salida;
$mysqli->close();
