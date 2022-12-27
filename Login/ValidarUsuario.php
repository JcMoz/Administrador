<?php

//crear un usuario
//$clave =  password_hash('1234', PASSWORD_DEFAULT) ;
        
        
       
//fin de crear un usuario

 
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
//conectar a la base de datos 
$conexion=mysqli_connect("localhost", "root", "", "roaring");

//mysqli_query($conexion, "INSERT INTO usuario(name,con) VALUES ('Mario','$clave')");
//$consulta="SELECT * FROM usuario WHERE name = '$usuario'";
$consulta = mysqli_query($conexion, "SELECT * FROM usuario WHERE name='$usuario'");

if ($row = mysqli_fetch_array($consulta)) {
    $contra=$row['con'];
    if (password_verify($clave, $contra)) {
       
        //header("location:../principal.php");  
    }
}
/*$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);
   
if ($filas>0) {
            
       
      header("location:../principal.php");  
        
    }
else {
         
	header("location:../IniciarSesion/login.php");
}
mysqli_free_result($resultado);*/
mysqli_close($conexion);
?>