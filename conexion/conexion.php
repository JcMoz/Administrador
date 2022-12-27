<?php
$conexion = new mysqli("localhost","root","","roaring");
if($conexion){
    echo "ok";
}else{
    echo "No ok";
}
?>