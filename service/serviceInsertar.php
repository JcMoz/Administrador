<?php
include_once '../conexion/conexion.php';



            $nombre     = $_POST['name'];
            $cost       = $_POST['cost'];
            $descrip    = $_POST['description'];
            $estado     = "Activo";
            $image      = addslashes(file_get_contents($_FILES['file']['tmp_name']));

            $query = "INSERT INTO service(name_service,cost_service,description,image,estado) 
            values('$nombre','$cost','$descrip','$image','$estado')";
           
            $resultado = $conexion->query($query);
            if ($resultado) {

                echo 1;
            } else {
                echo 0;
            }
       


