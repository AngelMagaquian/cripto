<?php
require("class.phpmailer.php");
require("class.smtp.php");

$mail = new PHPMailer();

$mail->IsSMTP();                                      // set mailer to

$mail->Host = "mail.criptopremier.com.ar";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "info@criptopremier.com.ar";  // SMTP username
$mail->Password = "Mario2021"; // SMTP password

$mail->From = "info@criptopremier.com.ar";
$mail->FromName = "Registro Criptopremier";        // remitente
$mail->AddAddress("poner email del registro", "destinatario");        // destinatario

$mail->AddReplyTo("info@criptopremier.com.ar", "respuesta a");    // responder a

$mail->WordWrap = 50;     // set word wrap to 50 characters
$mail->IsHTML(true);     // set email


$nombre = $_POST['name_user'];
$email = $_POST['email'];
$pass = $_POST['first_pass'];



$cuerpoEmail="
Gracias por registrarte!
Tu cuenta ha sido creada, activala utilizando el enlace de la parte inferior.
 
------------------------
Username: '.$email.'
Password: '.$pass.'
------------------------
 
Por favor haz clic en este enlace para activar tu cuenta:
http://criptopremier.com/view/login/login.php?email='.$email.'"; 


$mail->Subject = "Confirmación de registro";
$mail->Body    = $cuerpoEmail;
$mail->AltBody = $cuerpoEmail;
if(!$mail->Send())
{
   echo "Hubo un error, vuelva a intentar";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}else{
	echo "Su mail fue enviado correctamente. En breve nos comunicaremos contigo.";
}


?> 