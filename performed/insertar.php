<?php
include_once '../conexion/conexion.php';



            $servicio     = $_POST['id_servicio'];
            $descripcion       = $_POST['descripcion'];
            $cliente    = $_POST['cliente'];
            $image      = addslashes(file_get_contents($_FILES['file']['tmp_name']));


            $query = "INSERT INTO performed(id_servicio,descripcion,image,cliente) 
            values('$servicio','$descripcion','$image','$cliente')";
           
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
       


