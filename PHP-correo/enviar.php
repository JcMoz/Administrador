<?php
    require_once("../PHP-correo/PHPMailer/clsMailer.php");

    $mailSend = new clsMailer();

    $bodyHTML ='
    <h2>Hola,ZORRA FUNCIONA</h2>
    <br>
    <br>
    <br>
    Mensaje final';


    $enviado = $mailSend->metEnviar("titulo, del correo","estoy probando","juan.moz@ues.edu.sv","asuntox",$bodyHTML);

    if($enviado){
        echo ("enviado");
    }else{
        echo ("No se puede enviar el correo");
    }


?>