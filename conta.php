<?php

$result="";
if(isset($_POST['submit'])){
    require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';
    $mail->Username='jonathanjaimesmoreno@gmail.com';
    $mail->Password='almacenes5';

    $mail->setFrom($_POST['email'],$_POST['nombre']);
    $mail->addAddress('jonathanguillermojm@ufps.edu.co');
    $mail->addReplyTo($_POST['email'],$_POST['nombre']);

    $mail->isHTML(true);
    $mail->Subject='Enviado por '.$_POST['nombre'];
    $mail->Body='<h1 align=center>Nombre: '.$_POST['nombre'].'<br>Email: '.$_POST['email'].'<br>Teléfono: '.$_POST['tel'].'<br>Mensaje: '.$_POST['mensaje'].'</h1>';

    if(!$mail->send()){
    $result="Algo está mal, inténtelo de nuevo";
    }
    else
    {
    $result="Gracias ".$_POST['nombre']." por contactarnos, espera la respuesta muy pronto";
    }
}


?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    
</head>
<body>
    <h5 class="notifCorrecto"> <?= $result; ?></h5>
</body>
</html>
