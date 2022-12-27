<?php
include_once '../conexion/conexion.php';

$nombre     = $_POST['name'];
$cost       = $_POST['cost'];
$descrip    = $_POST['description'];
$image      = addslashes(file_get_contents($_FILES['image']['tmp_name']));

$query = "INSERT INTO service(name_service,cost_service,description,image) 
values('$nombre','$cost','$descrip','$image')";
$resultado = $conexion->query($query);
if($resultado){
    echo "si";
}else{
    echo "No";
}
?>