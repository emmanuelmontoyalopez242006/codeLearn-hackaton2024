<?php
session_start();
require('../db/conexion.php');

$idCurso = $_GET['id'];
$usuario = $_SESSION['usuario'];

// Verificar si no esta inscrito ya
$yaInscrito = conexion();
$yaInscrito = $yaInscrito->query("SELECT * FROM  inscritos WHERE id_curso = " . $idCurso . " AND usuario = '" . $usuario . "'");
if ($yaInscrito->rowCount() > 0) {
  if (headers_sent()) {
    echo "<script> window.location.href='../index.php?vista=perfilUser&success=Ya estas inscrito en este curso'; </script>";
  } else {
    header("Location: ../index.php?vista=perfilUser&success=Ya estas inscrito en este curso");
  }
  exit();
} else {
  // Guardando datos con el metodo prepare de conexion para evitar inyeccion
  // :marcador
  $fechaHoraActual = date('Y-m-d H:i:s');
  $guardar_inscrito = conexion();
  $guardar_inscrito = $guardar_inscrito->prepare("INSERT INTO inscritos(usuario, id_curso,hora_inscripcion) VALUES(:usuario, :id_curso,:hora_inscripcion) ");
  $marcadores = [
    ":usuario" => $usuario,
    ":id_curso" => $idCurso,
    ":hora_inscripcion" => $fechaHoraActual
  ];
  $guardar_inscrito->execute($marcadores);

  if ($guardar_inscrito->rowCount() == 1) {
    if (headers_sent()) {
      echo "<script> window.location.href='../index.php?vista=perfilUser&success=Te has inscrito al curso con exito'; </script>";
    } else {
      header("Location: ../index.php?vista=perfilUser&success=Te has inscrito al curso con exito");
    }
    exit();
  } else {
    if (headers_sent()) {
      echo "<script> window.location.href='../index.php?vista=perfilUser&success=Error en la inscripción'; </script>";
    } else {
      header("Location: ../index.php?vista=perfilUser&success=Error en  la inscripción");
    }
    exit();
  }
  // Cerrar conexion a la base de datos
  $guardar_inscrito = null;
}
