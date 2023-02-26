


<?php
include_once './Plantilla/cabecera.php';
include_once './Plantilla/sidebar.php';
include_once './Plantilla/topBar.php';
include_once "./conexion/conexion.php";

$query = "SELECT*FROM usuario WHERE id='".$_SESSION["userId"]."'";
$result = $conexion->query($query);
        $row = $result->fetch_assoc();
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
        <div class="col-xl-5 col-md-5 mb-4">
            <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h6>Hi <?php echo $row["name"];?></h6>
                    <input type="text" id="fromUser" value="<?php echo $row["id"];?>" hidden />
                        <h6 class="m-0 font-weight-bold text-primary">Message to customer:</h6>
                    </div>
                    <div class="card-body">
                    <ul>
                    <?php
                   
                    $sms= "SELECT*FROM usuario WHERE tipo='cl'";
                    $resultado = $conexion->query($sms);
                            while($msj = $resultado->fetch_assoc()){
                                if($msj["new"]=='new'){
                                echo '
                                <li><a href=?toUser='.$msj["id"].'>'.$msj["name"].'
                                </a> <span class="badge badge-danger badge-counter">
                                <i class="fas fa-envelope fa-fw"></i>New</span>
                                </li>
                                ';
                                }else{
                                    echo '
                                    <li><a href=?toUser='.$msj["id"].'>'.$msj["name"].'
                                    </a>
                                    </li>
                                    ';

                                }
                            }          
                    ?>
                    </ul>
                        
                    </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6 mb-4">
            <!--ENVIAR LOS MJS-->
        <div class="card shadow mb-4">
            <div class="modal-dialog mb-4">
                    <div class="modal-content">
                            <div class="modal-header">
                                    <h4>
                                        <?php
                                        if(isset($_GET["toUser"])){
                                            //ACTUALIZAMOS LOS MSJ
                                            $update = "UPDATE usuario set new='opened' WHERE id='".$_GET["toUser"]."'";
                                            $conexion->query($update);
                                            //FIN DE ACTUALIZACION DE LOS MJS
                                            
                                            $userName= "SELECT*FROM usuario WHERE id='".$_GET["toUser"]."'";
                                            $re = $conexion->query($userName);
                                            $uName = $re->fetch_assoc();
                                            echo '<input type="text" value='.$_GET["toUser"].' id="toUser" hidden/>' ;
                                            echo $uName["name"];        
                                        }else{
                                            echo 'Select a chat ';
                                            /*$userName= "SELECT*FROM usuario";
                                            $re = $conexion->query($userName);
                                            $uName = $re->fetch_assoc();
                                            $_SESSION["toUser"]= $uName["id"];
                                            echo '<input type="text" value='.$_SESSION["toUser"].' id="toUser" hidden/>' ;
                                            echo $uName["name"];*/   

                                        }
                                        ?>

                                    </h4>
                            </div>
                            <div class="modal-body" id="msgBody" style="height: 300px; overflow-y: scroll; overflow-x: hidden;">
                            <?php
                            if(isset($_GET["toUser"]))
                            $chats= "SELECT*FROM message WHERE (fromUser='".$_SESSION["userId"]."' AND toUser = '".$_GET["toUser"]."') OR (fromUser='".$_GET["toUser"]."' AND toUser = '".$_SESSION["userId"]."')"; //$reChat = $conexion->query($chats);    
                            else
                            $chats= "SELECT*FROM message WHERE (fromUser='".$_SESSION["userId"]."' AND toUser = '".$_SESSION["toUser"]."') OR (fromUser='".$_SESSION["toUser"]."' AND toUser = '".$_SESSION["userId"]."')";
                            $reChat = $conexion->query($chats);
                                while($chat = $reChat->fetch_assoc()){
                                    if($chat["fromUser"] == $_SESSION["userId"])
                                    echo"<div style='text-align:right;'>
                                        <p style='background-color:lightblue; word-wrap:break-word; display:inline-block;
                                        padding: 5px; border-radius:10px; max width: 70px;'>
                                            ".$chat["message"]."
                                        </p>
                                    </div>";
                                    else
                                    echo"<div style='text-align:left;'>
                                    <p style='background-color:yellow; word-wrap:break-word; display:inline-block;
                                    padding: 5px; border-radius:10px; max width: 70px;'>
                                        ".$chat["message"]."
                                    </p>
                                    </div>";
                                }
                            ?>
                            </div>
                            <div class="modal-footer">
                                <textarea id="message" class="form-control" style="height: 60px;"></textarea>
                                <button id="send" class="btn btn-primary" style="height: 70%;">Send</button>
                            </div>
                    </div>
                </div>
        </div>  
            <!--FIN DE ENVIAR LOS MJS-->
            

        </div>

    </div>

    <div class="row">

        <!-- formulario para registrar the service-->
    </div>
</div>
<!-- /.container-fluid -->

<script type="text/javascript">
    $(document).ready(function(){
        $("#send").on("click",function(){
            $.ajax({
                url:"chat/insertarMessage.php",
                method: "POST",
                data:{
                    fromUser: $("#fromUser").val(),
                    toUser: $("#toUser").val(),
                    message: $("#message").val()
                },
                dataType:"text",
                success:function(data){
                    $("#message").val("");
                }


            });

        });
        setInterval(function(){
            $.ajax({
                url:"chat/realTimeChat.php",
                method:"POST",
                data:{
                    fromUser:$("#fromUser").val(),
                    toUser:$("#toUser").val()
                },
                dataType:"text",
                success:function(data){
                    $("#msgBody").html(data);
                }

            });
           

        });

        document.getElementById('msgBody').scrollTop=5000;

       
    });



</script>

<?php
include_once './Plantilla/footer.php';
include_once './Plantilla/fin.php';
?>
