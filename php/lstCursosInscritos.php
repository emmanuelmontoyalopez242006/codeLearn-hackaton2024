<?php
$usuario = $_SESSION['usuario'];
$cursos = conexion();
$cursos = $cursos->query("SELECT cursos.id AS id_curso, cursos.nombre AS nombre_curso, cursos.imagen AS imagen, cursos.descripcion AS descripcion, cursos.duracion AS duracion, usuarios.usuario, inscritos.id_curso, inscritos.hora_inscripcion
        FROM cursos
        INNER JOIN inscritos ON cursos.id = inscritos.id_curso
        INNER JOIN usuarios ON usuarios.usuario = inscritos.usuario
        WHERE usuarios.usuario = '" . $usuario . "'
        ORDER BY inscritos.hora_inscripcion DESC");

if ($cursos->rowCount() > 0) {
  $cursos = $cursos->fetchAll();
  foreach ($cursos as $curso) {
?>
    <article class="min-w-[250px] max-w-[260px] w-full min-h-[390px] max-h-[390px] bg-[#ffffff12] rounded-[6px] sm:w-[300px] overflow-hidden">
      <header>
        <img src="./php/imagenesCursos/<?php echo $curso['imagen'] ?>" alt="fundamentos de programación" class="rounded-tl-[12px] rounded-tr-[12px] max-h-40 w-full bg-cover">
      </header>
      <h3 class="m-[8px] font-bold"><?php echo $curso['nombre_curso'] ?></h3>
      <div class="min-h-[auto] max-h-[auto] overflow-y-auto">
        <p class="m-3"><?php echo $curso['descripcion'] ?></p>
      </div>
      <div class="w-full">
        <p class="m-3">Duracion: <strong><?php echo $curso['duracion'] ?></strong> Horas</p>
      </div>
      <div class="w-full flex justify-center items-center">
        <a href="index.php?vista=verCurso&id=<?php echo $curso['id_curso'] ?>" class=" bg-[#09f] px-6 py-1 rounded-md mt-3">Ver</a>
      </div>
    </article>
<?php
  }
}
$cursos = null;
