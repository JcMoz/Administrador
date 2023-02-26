<?php
  include_once '../conexion/conexion.php';

  $query = "SELECT * FROM question ORDER BY estado DESC";
  $result = $conexion->query($query);
  

  $json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
      'estado' => $row['estado'],
      'question' => $row['question'],
      'correo' => $row['correo'],
      'name' => $row['name'],
      'reply' => $row['reply'],
      'id' => $row['id_question']
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>
