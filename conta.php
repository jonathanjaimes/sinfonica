<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'correopuenteparaformularios@gmail.com';                     // SMTP username
    $mail->Password   = '23Hilbert';                               // SMTP password
    $mail->SMTPSecure = ssl;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('correopuenteparaformularios@gmail.com', 'Consulta');
    $mail->addAddress('jonathanguillermojm@ufps.edu.co');     // Add a recipient
    $mail->addReplyTo($_POST['email'],$_POST['nombre']);


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Enviado por '.$_POST['nombre'];
    $mail->Body    = '<h1 align=center>Nombre: '.$_POST['nombre'].'<br>Email: '.$_POST['email'].'<br>Teléfono: '.$_POST['tel'].'<br>Mensaje: '.$_POST['mensaje'].'</h1>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

