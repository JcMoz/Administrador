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
            $json = array();
            if ($resultado) {
                $json[] = array(
                    'success'=>1,
                    'title' => 'Saved',
                    'mensaje'=>'Record saved successfully!'
                  );
                 // echo 1;
            } else {
                $json[] = array(
                    'title' => "Error",
                    'mensaje'=>"There was an error!"
                  );
            }
           $jsonstring = json_encode($json[0]);
           echo $jsonstring;
       


