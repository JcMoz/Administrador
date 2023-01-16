<?php

include_once "./conexion/conexion.php";

if(isset($_GET["userId"])){
    $_SESSION["userId"]=$_GET["userId"];
    header("location: message.php");
}

?>

<?php
include_once './Plantilla/cabecera.php';
include_once './Plantilla/sidebar.php';
include_once './Plantilla/topBar.php';
?>



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!--HEADING VACIO PARA MANTENER UN MARGEN-->
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- formulario para registrar the service-->
        <div class="col-xl-2 col-md-2 mb-4">

        </div>

        <div class="col-xl-7 col-md-8 mb-4">
            

        </div>

    </div>

    <div class="row">

        <!-- formulario para registrar the service-->


        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Registered services</h6>
                </div>
                <div class="card-body">
                    
                </div>
            </div>


        </div>

    </div>




</div>
<!-- /.container-fluid -->



<?php
include_once './Plantilla/footer.php';
include_once './Plantilla/fin.php';
?>





<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>RoaringForkCleaningService</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/roaring.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <h4>Please Select your Account</h4>
        </div>
        <div class="modal-body">
            <ol>
                <?php
                        
                        $query = "SELECT*FROM usuario";
                        $result = $conexion->query($query);
                                while($row = $result->fetch_assoc()){
                                    echo '<li>
                                    <a href="chat.php?userId='.$row["id"].'">'.$row["name"].'</a>
                                    </li>';
                                }
                    ?>
            </ol>
            <a href="registerUser.php">Register Here.</a>
        </div>
        </div>
    </div>
    
</body>
</html>