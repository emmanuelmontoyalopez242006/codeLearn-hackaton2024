<?php

require('./funciones.php');
require('../db/conexion.php');

// Almacenando datos del formulario y limpiandolos con la funcion limpiar_cadena para evitar inyeccion de codigo
$nombre = limpiar_cadena($_POST['nombre']);
$descripcion = limpiar_cadena($_POST['descripcion']);
$fechaPublicacion = limpiar_cadena($_POST['fechaPublicacion']);
$nombreRutaTemporal = $_FILES['imagen']['tmp_name'];
$nombreImagen = $_FILES['imagen']['name'];
$duracion = limpiar_cadena($_POST['duracion']);
$cupos = limpiar_cadena($_POST['cupos']);


// Mover archivo
// verificar si el directorio existe o no / (0777) => todos los permisos
if (!file_exists("imagenesCursos")) {
  if (!mkdir("imagenesCursos", 0777)) {
    echo "Error al crear el directorio";
    exit(); // => Detiene la ejecuccion del script
  }
}

chmod("imagenesCursos", 0777); // Dar permisos

// Moviendo el archivo => move_upload_file(nombreTemporal,rutaFutura)
if (move_uploaded_file($nombreRutaTemporal, "imagenesCursos/" . $nombreImagen)) {
  // Guardando datos con el metodo prepare de conexion para evitar inyeccion
  // :marcador
  $guardar_curso = conexion();
  $guardar_curso = $guardar_curso->prepare("INSERT INTO cursos(nombre, fecha_publicacion, descripcion, imagen, duracion, cupos) VALUES(:nombre, :fecha_publicacion, :descripcion, :imagen, :duracion, :cupos) ");
  $marcadores = [
    ":nombre" => $nombre,
    ":fecha_publicacion" => $fechaPublicacion,
    ":descripcion" => $descripcion,
    ":imagen" => $nombreImagen,
    ":duracion" => $duracion,
    ":cupos" => $cupos
  ];
  $guardar_curso->execute($marcadores);

  if ($guardar_curso->rowCount() == 1) {
    if (headers_sent()) {
      echo "<script> window.location.href='../index.php?vista=crearCurso&success=El curso se ha creado con exito'; </script>";
    } else {
      header("Location: ../index.php?vista=crearCurso&success=El curso se ha creado con exito");
    }
    exit();
  } else {
    if (headers_sent()) {
      echo "<script> window.location.href='../index.php?vista=crearCurso&error=No se pudo crear el curso 😔'; </script>";
    } else {
      header("Location: ../index.php?vista=crearCurso&error=No se pudo crear el curso 😔");
    }
    exit();
  }
  // Cerrar conexion a la base de datos
  $guardar_curso = null;
} else {
  echo "Error al subir el archivo";
}
