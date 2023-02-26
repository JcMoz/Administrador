<?php
include_once '../conexion/conexion.php';
if(isset($_POST['id'])) {
  

  $id = $_POST['id'];
  

  $query = "SELECT id,id_servicio, descripcion, cliente, estado,TO_BASE64(image)image
   FROM performed WHERE id ='$id'";
  $result = $conexion->query($query);
 // var_dump($result);


  $json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
      'id_servicio' => $row['id_servicio'],
      'descripcion' => $row['descripcion'],
      'cliente' => $row['cliente'],
      'image' => $row['image'],
      'id' => $row['id']
    );
  }
  $jsonstring = json_encode($json[0]);
  echo $jsonstring;
}
