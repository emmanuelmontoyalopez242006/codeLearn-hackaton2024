<?php
$cursos = conexion();
$cursos = $cursos->query("SELECT * FROM cursos");
if ($cursos->rowCount() > 0) {
  $cursos = $cursos->fetchAll();
  foreach ($cursos as $curso) {
?>
    <article class="min-w-[250px] max-w-[260px] w-full min-h-[390px] max-h-[390px] bg-[#ffffff12] rounded-[6px] sm:w-[300px] overflow-hidden">
      <header>
        <img src="./php/imagenesCursos/<?php echo $curso['imagen'] ?>" alt="fundamentos de programación" class="rounded-tl-[12px] rounded-tr-[12px] max-h-40 w-full bg-cover">
      </header>
      <h3 class="m-[8px] font-bold"><?php echo $curso['nombre'] ?></h3>
      <div class="min-h-[auto] max-h-[auto] overflow-y-auto">
        <p class="m-3"><?php echo $curso['descripcion'] ?></p>
      </div>
      <div class="w-full">
        <p class="m-3">Duracion: <strong><?php echo $curso['duracion'] ?></strong> Horas</p>
      </div>
      <?php if ($_GET['vista'] !== 'perfilUser') : ?>
        <div class="w-full flex justify-center items-center">
          <a href="index.php?vista=verMas&id=<?php echo $curso['id'] ?>" class=" bg-[#09f] px-2 py-1 rounded-md mt-3">Ver mas sobre este curso</a>
        </div>
      <?php else : ?>
        <div class="w-full flex justify-center items-center">
          <a href="index.php?vista=inscribirCurso&id=<?php echo $curso['id'] ?>" class=" bg-[#09f] px-2 py-1 rounded-md mt-3">Inscribirme al curso</a>
        </div>
      <?php endif; ?>
    </article>
<?php
  }
}
$cursos = null;
