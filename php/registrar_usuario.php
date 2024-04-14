<?php
ini_set('display_errors', 0);
require('./funciones.php');
require('../db/conexion.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

// Almacenando datos del formulario y limpiandolos con la funcion limpiar_cadena para evitar inyeccion de codigo
$nombre = limpiar_cadena($_POST['nombres']);
$apellidos = limpiar_cadena($_POST['apellidos']);
$email = limpiar_cadena($_POST['email']);
$usuario = limpiar_cadena($_POST['usuario']);
$contrasena = limpiar_cadena($_POST['contrasena']);

// Verificando integridad de los datos
if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $nombre)) {
  if (headers_sent()) {
    echo "<script> window.location.href='../index.php?vista=register&error=formato no deseado'; </script>";
  } else {
    header("Location: ../index.php?vista=register&error=formato no deseado para nombre");
  }
  exit();
}
if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $apellidos)) {
  if (headers_sent()) {
    echo "<script> window.location.href='../index.php?vista=register&error=formato no deseado'; </script>";
  } else {
    header("Location: ../index.php?vista=register&error=formato no deseado para apellidos");
  }
  exit();
}
if (verificar_datos("[a-zA-Z0-9]{3,40}", $usuario)) {
  if (headers_sent()) {
    echo "<script> window.location.href='../index.php?vista=register&error=formato no deseado'; </script>";
  } else {
    header("Location: ../index.php?vista=register&error=formato no deseado usuario");
  }
  exit();
}
// if (verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,30}", $contrasena)) {
//   if (headers_sent()) {
//     echo "<script> window.location.href='../index.php?vista=register&error=formato no deseado'; </script>";
//   } else {
//     header("Location: ../index.php?vista=register&error=formato no deseado para la contraseña");
//   }
//   exit();
// }

// Verificando email
if ($email != "") {
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // => correo valido
    $check_email = conexion();
    $check_email = $check_email->query("SELECT email FROM usuarios WHERE email = '$email'");
    if ($check_email->rowCount() > 0) {
      if (headers_sent()) {
        echo "<script> window.location.href='../index.php?vista=register&error=El email ya existe'; </script>";
      } else {
        header("Location: ../index.php?vista=register&error=El email ya existe");
      }
      exit();
    }
    // Cerrar la conexion
    $check_email = null;
  } else {
    if (headers_sent()) {
      echo "<script> window.location.href='../index.php?vista=register&error=El email ingresado no es valido'; </script>";
    } else {
      header("Location: ../index.php?vista=register&error=El email ingresado no es valido");
    }
    exit();
  }
}

// Verificando usuario
$check_usuario = conexion();
$check_usuario = $check_usuario->query("SELECT usuario FROM usuarios WHERE usuario = '$usuario'");
if ($check_usuario->rowCount() > 0) {
  if (headers_sent()) {
    echo "<script> window.location.href='../index.php?vista=register&error=El usuario ya existe'; </script>";
  } else {
    header("Location: ../index.php?vista=register&error=El usuario ya existe");
  }
  exit();
}
// Cerrar la conexion
$check_usuario = null;

// Verificando claves

$clave = password_hash($contrasena, PASSWORD_BCRYPT, ["cost" => 10]);


// Guardando datos con el metodo prepare de conexion para evitar inyeccion
// :marcador
$guardar_usuario = conexion();
$guardar_usuario = $guardar_usuario->prepare("INSERT INTO usuarios(nombre, apellidos, email, usuario, contrasena) VALUES(:nombres, :apellidos, :email, :usuario, :contrasena) ");
$marcadores = [
  ":nombres" => $nombre,
  ":apellidos" => $apellidos,
  ":email" => $email,
  ":usuario" => $usuario,
  ":contrasena" => $clave
];
$guardar_usuario->execute($marcadores);

if ($guardar_usuario->rowCount() == 1) {


  //Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);
  $body = '<h2>Gracias por registrarte en codeLearn</h2>
<p>Ahora puedes iniciar sesion e inscribirte en todos nuestros cursos, es gratis!</p>
<a href="index.php?vista=cambiarContrasena&user=';
  $body .= $usuario . "\"";
  $body .= '>Cambiar contraseña</a>';

  try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'emmanuelprogramador24@gmail.com';                     //SMTP username
    $mail->Password   = 'rhbb dooe ivmb jjeo';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('emmanuelprogramador24@gmail.com', 'codeLearn');
    $mail->addAddress($email, $email);     //Add a recipient
    //Name is optional
    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Te has registrado en codeLearn';
    $mail->Body    = $body;

    if ($mail->send()) {
      if (headers_sent()) {
        echo "<script> window.location.href='../index.php?vista=register&success=Tu cuenta se ha creado con exito, te hemos enviado un correo 🙋🏻‍♂'; </script>";
      } else {
        header("Location: ../index.php?vista=register&success=Tu cuenta se ha creado con exito, te hemos enviado un correo 🙋🏻‍♂️");
      }
    }
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
} else {
  if (headers_sent()) {
    echo "<script> window.location.href='../index.php?vista=register&error=No se pudo crear la cuenta 😔'; </script>";
  } else {
    header("Location: ../index.php?vista=register&error=No se pudo crear la cuenta 😔");
  }
  exit();
}
// Cerrar conexion a la base de datos
$guardar_usuario = null;
