<?php

  include_once '../conexion/conexion.php';

if(isset($_POST['_id'])) {

    $servicio     = $_POST['id_servicio'];
    $descripcion       = $_POST['descripcion'];
    $cliente    = $_POST['cliente'];
    
    $id = $_POST['_id'];
    //echo $_POST['file'];
    if($_POST['file']=='undefined'){

        $query = "UPDATE performed SET id_servicio='$servicio',descripcion='$descripcion',
        cliente='$cliente' WHERE id = '$id'";
        $resultado = $conexion->query($query);
    
    }else{
        $image      = addslashes(file_get_contents($_FILES['file']['tmp_name']));
        $query = "UPDATE performed SET id_servicio='$servicio',descripcion='$descripcion',
        cliente='$cliente', image='$image' WHERE id = '$id'";
        $resultado = $conexion->query($query);
    }
   
    $json = array();
    if ($resultado) {
        $json[] = array(
            'success'=>1,
            'title' => 'Updated',
            'mensaje'=>'Record updated successfully!'
          );

       // echo 1;
    } else {
        $json[] = array(
            'title' => "Error",
            'mensaje'=>"There was an error!"
          );
        //echo 0;
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
       

}

?>