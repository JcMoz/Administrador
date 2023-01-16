<?php
 include_once "../conexion/conexion.php";
 if(isset($_POST["toUser"])){
 $fromUser  = $_POST["fromUser"];
 $toUser    = $_POST["toUser"];
 $output = "";

 $chats= "SELECT*FROM message WHERE (fromUser='".$fromUser."' AND toUser = '".$toUser."') 
 OR (fromUser='".$toUser."' AND toUser = '".$fromUser."')";
    $reChat = $conexion->query($chats);
    while($chat = $reChat->fetch_assoc()){
        if($chat["fromUser"] == $fromUser)
        $output .="<div style='text-align:right;'>
            <p style='background-color:lightblue; word-wrap:break-word; display:inline-block;
            padding: 5px; border-radius:10px; max width: 70px;'>
                ".$chat["message"]."
            </p>
        </div>";
        else
        $output .="<div style='text-align:left;'>
        <p style='background-color:yellow; word-wrap:break-word; display:inline-block;
        padding: 5px; border-radius:10px; max width: 70px;'>
            ".$chat["message"]."
        </p>
        </div>";


    }
    echo $output;
 }

?>