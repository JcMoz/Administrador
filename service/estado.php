<?php
include_once '../conexion/conexion.php';
if (isset($_POST['id'])) {


    $id = $_POST['id'];


    $query = "SELECT estado FROM service WHERE id ='$id'";
    $result = $conexion->query($query);
    //var_dump($result);


    $json = array();
    while ($row = mysqli_fetch_array($result)) {

        $estado = $row['estado'];
    }

    if ($estado == "Activo") {
        $query = "UPDATE service SET estado='Inactivo' WHERE id = '$id'";
    } else {
        $query = "UPDATE service SET estado='Activo' WHERE id = '$id'";
    }
    $resultado = $conexion->query($query);

    if ($resultado) {
        $json[] = array(
            'title' => 'Updated',
            'mensaje' => ' Status updated successfully!'
        );
    }else{
        $json[] = array(
            'title' => "Error",
            'mensaje'=>"There was an error!"
          );
    }


    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}
