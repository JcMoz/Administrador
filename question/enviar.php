<?php
    
    require_once("../PHP-correo/PHPMailer/clsMailer.php");
    include_once '../conexion/conexion.php';

if(isset($_POST['_id'])) {
    $name     = $_POST['name'];
    $reply       = $_POST['reply'];
    $correo    = $_POST['email'];
    $id = $_POST['_id'];
    //echo $_POST['file'];
   
        $query = "UPDATE question SET reply='$reply',estado='Atendida' WHERE id_question = '$id'";
        $resultado = $conexion->query($query);
   
    $json = array();
    if ($resultado) {
        $json[] = array(
            'success'=>1,
            'title' => 'Send',
            'mensaje'=>'email send successfully!'
          );

    //---------------------------------ENVIAR CORREO

    $mailSend = new clsMailer();

    $bodyHTML ='
    <h2>Hola,'.$name.'</h2>
    <br>
    <br>
    <h2>'.$reply.'</h2>

    <br>
    Thanks for contacting us';


    $enviado = $mailSend->metEnviar("Answer","Email response received web page",$correo,"Answer Roaring Fork Cleaning Service",$bodyHTML);

    if($enviado){
       
    }else{
       
    }

    //-------------------------------------------FIN DE ENVIAR CORREO
    } else {
        $json[] = array(
            'title' => "Error",
            'mensaje'=>"There was an error!"
          );
        //echo 0;
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
       

}
