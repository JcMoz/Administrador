<?php
  include_once '../conexion/conexion.php';

  $query = "SELECT name_service, cost_service, description,TO_BASE64(image)image, id
   FROM service";
  $result = $conexion->query($query);
  

  $json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
      'name' => $row['name_service'],
      'cost' => $row['cost_service'],
      'description' => $row['description'],
      'image' => $row['image'],
      'id' => $row['id']
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>
