<?php
    require('connection.php');
    /**
     * Clase para ingresar productos al inventario
     */
    class DeleteAsignacionEncargado extends ConectionDB
    {
        public function DeleteAsignacionEncargado()
        {
            parent::__construct ();
        }
        public function enter()
        {
            try {
                  $Id = $_GET['Id'];

                    $query = "UPDATE tbl_departamento set IdEmpleado = 0 where IdDepartamento='".$Id."'";
                       $statement = $this->dbConnect->prepare($query);
                       $statement->execute();
                    header('Location: ../pages/AsignarEncargadoDepartamento.php?status=success');
            } catch (Exception $e) {
                print "!Error¡: " . $e->getMessage() . "</br>";
                die();
                header('Location: ../pages/AsignarEncargadoDepartamento.php?status=failed');
            }
        }
    }
    $enter = new DeleteAsignacionEncargado();
    $enter->enter();
?>
