<?php
  include_once '../conexion/conexion.php';

  $query = "SELECT id,name_service FROM service";
  $result = $conexion->query($query);
  

  $json = array();
  $i=0;

  while($row = mysqli_fetch_array($result)) {
    $i++;
    $json[] = array(
      'name_service'    => $row['name_service'],
      'id' => $row['id'] 
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>