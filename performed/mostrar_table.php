<?php
  include_once '../conexion/conexion.php';

  $query = "SELECT p.id,p.descripcion,p.cliente,p.estado,TO_BASE64(p.image)image,s.name_service FROM performed p INNER JOIN service s ON p.id_servicio=s.id; ";
  $result = $conexion->query($query);
  

  $json = array();
  $i=0;

  while($row = mysqli_fetch_array($result)) {
    $i++;
    $json[] = array(
      'id'    => $row['id'],
      'descripcion' => $row['descripcion'],
      'cliente'       => $row['cliente'],
      'estado'  => $row['estado'],
      'image'     => '<td><img height="40px" src="data:image/png;base64,'.$row["image"].'"></td>',
      'name_service'  => $row['name_service'],
      'botones'=>'<td>
      <div class="form-group row">
          <a title="Editar" class="nav-link edit-item" id-item="'.$row["id"].'">

          <i class="fas fa-fw fa-edit"></i>
          </a>
      </div>
      </td>',
      'i'=>$i
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>