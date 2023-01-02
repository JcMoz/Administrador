<?php
$conexion = new mysqli("localhost","root","","roaring");
//$conexion = new mysqli("localhost","k240819_roaring","adminroaring","k240819_roaring");

if($conexion){
   // echo "ok";
}else{
    echo "No ok";
}
?>