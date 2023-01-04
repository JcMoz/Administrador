<?php

  include_once '../conexion/conexion.php';

if(isset($_POST['_id'])) {
    $nombre     = $_POST['name'];
    $cost       = $_POST['cost'];
    $descrip    = $_POST['description'];
    $estado     = "Activo";
    $id = $_POST['_id'];
    //echo $_POST['file'];
    if($_POST['file']=='undefined'){

        $query = "UPDATE service SET name_service='$nombre',cost_service='$cost',
        description='$descrip' WHERE id = '$id'";
        $resultado = $conexion->query($query);
    
    }else{
        $image      = addslashes(file_get_contents($_FILES['file']['tmp_name']));
        $query = "UPDATE service SET name_service='$nombre',cost_service='$cost',
        description='$descrip', image='$image' WHERE id = '$id'";
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