<?php
include_once '../conexion/conexion.php';
if(isset($_POST['id'])) {
  

  $id = $_POST['id'];
  

  $query = "SELECT name_service, cost_service, description,TO_BASE64(image)image, id
   FROM service WHERE id ='$id'";
  $result = $conexion->query($query);
  //var_dump($result);


  $json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
      'name_service' => $row['name_service'],
      'cost_service' => $row['cost_service'],
      'description' => $row['description'],
      'image' => $row['image'],
      'id' => $row['id']
    );
  }
  $jsonstring = json_encode($json[0]);
  echo $jsonstring;
}
