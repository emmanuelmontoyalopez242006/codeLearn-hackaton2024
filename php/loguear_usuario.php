<?php
session_start();

require('./funciones.php');
require('../db/conexion.php');

// Almacenando datos del formulario y limpiandolos con la funcion limpiar_cadena para evitar inyeccion de codigo
$usuario = limpiar_cadena($_POST['usuario']);
$contrasena = limpiar_cadena($_POST['contrasena']);

$chek_user = conexion();
$chek_user = $chek_user->query("SELECT * FROM usuarios WHERE usuario = '$usuario'");

if ($chek_user->rowCount() == 1) {
  $chek_user = $chek_user->fetch();
  if ($chek_user['usuario'] == $usuario && password_verify($contrasena, $chek_user['contrasena'])) {

    $_SESSION['id'] = $chek_user['id'];
    $_SESSION['nombre'] = $chek_user['nombre'];
    $_SESSION['apellido'] = $chek_user['apellidos'];
    $_SESSION['email'] = $chek_user['email'];
    $_SESSION['usuario'] = $chek_user['usuario'];

    if (headers_sent()) {
      echo "<script> window.location.href='../index.php?vista=perfilUser'; </script>";
    } else {
      header("Location: ../index.php?vista=perfilUser");
    }
  } else {
    if (headers_sent()) {
      echo "<script> window.location.href='../index.php?vista=login&error=Contraseña incorrecta'; </script>";
    } else {
      header("Location: ../index.php?vista=login&error=Contraseña incorrecta para el usuario " . $chek_user['usuario'] . "");
    }
  }
} else {
  if (headers_sent()) {
    echo "<script> window.location.href='../index.php?vista=login&error=El usuario no existe'; </script>";
  } else {
    header("Location: ../index.php?vista=login&error=El usuario no existe");
  }
}
