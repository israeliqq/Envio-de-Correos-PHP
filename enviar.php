<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>Formulario</title> 
</head>

<body>
<?php
//Recibir parametros del formulario mediante el metodo post

$Rut     = $_POST['Rut'];
$Nombre  = $_POST['Nombre'];
$Paterno = $_POST['Paterno'];
$Materno = $_POST['Materno'];
$Cargo   = $_POST['Cargo'];
$Email   = $_POST['Email'];
$Mensaje = $_POST['Mensaje'];
$Archivo = $_FILES['Archivo'];


//Llamada a la libreria PHPMAILER

require("lib/class.phpmailer.php");
$mail = new PHPMailer();

$mail->From     = $Email;
$mail->FromName = $Nombre." ".$Paterno." ".$Materno; 
$mail->AddAddress("israeliqq@live.cl"); // Dirección a la que llegaran los mensajes.

// Aquí van los datos que apareceran en el correo que reciba

$mail->WordWrap = 50;  //Acortador de Caracteres
$mail->IsHTML(true);   //Identificación de documento HTML
$mail->CharSet = 'UTF-8'; //codificación latina

//Aqui va el Asunto del Correo

$mail->Subject  =  "||| Envio CV |||"; 

//Aqui va el Mensaje del Correo

$mail->Body     =  "Nombre: $Nombre \n<br />". 
                    "Apellido Paterno: $Paterno \n<br />".  
                    "Apellido Materno: $Materno \n<br />".  
                    "Rut: $Rut \n<br />".     
                    "Email: $Email \n<br />".    
                    "Mensaje: $Mensaje \n<br />";

//Aqui va el archivo adjunto

$mail->AddAttachment($Archivo['tmp_name'], $Archivo['name']);

// Datos del servidor SMTP (salida)

$mail->IsSMTP(); 
$mail->Host     = "ssl://smtp.gmail.com:465";  // Servidor de Salida.
$mail->SMTPAuth = true;  //Autentificación SSL
$mail->Username = "israelteran.iquique@gmail.com";  // Correo Electrónico
$mail->Password = "minino42"; // Contraseña

// Control de Envio final del correo

if ($mail->Send()) echo "correo enviado exitosamente";
else echo "error al enviar correo: ".$mail->ErrorInfo;

?>
</body>
</html>