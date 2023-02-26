<?php
include_once '../conexion/conexion.php';
if (isset($_POST['id'])) {


    $id = $_POST['id'];


    $query = "SELECT * FROM question WHERE id_question ='$id'";
    $result = $conexion->query($query);
    //var_dump($result);


    $json = array();
    while ($row = mysqli_fetch_array($result)) {

        $json[] = array(
            'estado' => $row['estado'],
            'question' => $row['question'],
            'correo' => $row['correo'],
            'name' => $row['name'],
            'reply' => $row['reply'],
            'id' => $row['id_question']
        );
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}
