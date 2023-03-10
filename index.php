<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrador</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    

</head>

<body class="bg-gradient-primary">
    <?php
    session_start();
    include_once './mensajes.php';
    ?>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                        <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome!</h1>
                                    </div>
                                    <form class="user" action="" method="POST">
                                        <div class="form-group">
                                            <input type="text"  name="usuario" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter the user">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="clave" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                      <!--  <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>-->
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Login">
                                        <hr>
                                       <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>-->
                                    </form>
                                    <hr>
                                    <!--<div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <?php

//crear un usuario
//$clave =  password_hash('1234', PASSWORD_DEFAULT) ;
//fin de crear un usuario

if (!empty($_POST['usuario']) and !empty($_POST['clave'])) {
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
//conectar a la base de datos 
$conexion=mysqli_connect("localhost", "root", "", "roaring");
//$conexion=mysqli_connect("localhost", "k240819_roaring", "adminroaring", "k240819_roaring");


//mysqli_query($conexion, "INSERT INTO usuario(name,con) VALUES ('Mario','$clave')");
//$consulta="SELECT * FROM usuario WHERE name = '$usuario'";
$consulta = mysqli_query($conexion, "SELECT * FROM usuario WHERE name='$usuario'");

if ($row = mysqli_fetch_array($consulta)) {
    $contra=$row['con'];
    if (password_verify($clave, $contra)) {
        $_SESSION['user_name'] = $row['name'];
        $_SESSION["userId"]    = $row['id'];

        echo mensajes('Welcome<br>', 'verde') . '<br>';
        echo '<meta http-equiv="refresh" content="2;url=Principal.php">';
       // header("location:../principal.php");  
    }else{
        echo mensajes('Incorrect password<br>', 'rojo') . '<br>';  
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
}else{
    echo mensajes('Empty username and password<br>', 'rojo') . '<br>'; 
}
?>


    </div>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
   

</body>

</html>