<?php
$idCurso = $_GET['id'];
$curso = conexion();
$curso = $curso->query("SELECT * FROM cursos WHERE id=" . $idCurso);
if ($curso->rowCount() > 0) {
  $curso = $curso->fetch();
?>
  <main class="w-full h-screen flex flex-col sm:flex-row">
    <div class="w-[100%] h-screen sm:w-[70%] overflow-y-auto">
      <img src="./php/imagenesCursos/<?php echo $curso['imagen'] ?>" alt="" class="w-[100%] max-h-[55vh]">
      <div class="w-full p-3">
        <div class="w-full my-4 flex justify-between">
          <h2 class="text-dark-text font-bold text-2xl"><?php echo $curso['nombre'] . " - " . $curso['cupos'] . " cupos." ?></h2>
          <h3 class="text-dark-text"><?php echo $curso['fecha_publicacion'] ?></h3>
        </div>
        <div class="w-full my-4">
          <p class="text-dark-text"><?php echo $curso['descripcion'] ?></p>
        </div>
      </div>
    </div>
    <section class="w-[100%] sm:w-[30%] sm:max-w-[30%] sm:min-w-[300px] bg-[#444444] min-h-screen">
      <div class="w-full p-3">
        <div class="w-full flex justify-between">
          <h2 class="text-dark-text font-bold text-2xl">Lecciones del curso</h2>
          <h3 class="text-dark-text font-bold text-1xl"><?php echo $curso['duracion'] ?> Horas</h3>
        </div>

        <?php
        include('./php/temarios.php');
        if ($cursoFundamentos['id'] == $idCurso) {
          foreach ($cursoFundamentos['temario'] as $leccion) {
        ?>
            <details class="border-none rounded my-3">
              <summary class="bg-[#333333] text-dark-text p-2 cursor-pointer"><?php echo $leccion[0] ?></summary>
              <p class="p-2 bg-[#444444] text-dark-text"><?php echo $leccion[1] ?></p>
            </details>

          <?php
          }
        } else if ($cursoHTML['id'] == $idCurso) {
          foreach ($cursoHTML['temario'] as $leccion) {
          ?>
            <details class="border-none rounded my-3">
              <summary class="bg-[#333333] text-dark-text p-2 cursor-pointer"><?php echo $leccion[0] ?></summary>
              <p class="p-2 bg-[#4444] text-dark-text"><?php echo $leccion[1] ?></p>
            </details>
        <?php
          }
        }
        ?>
        <div class="w-full text-center my-3">
          <a href="index.php?vista=index&success=Crea una cuenta e inscribete, es gratis!" class="bg-[#09f] px-3 py-2 rounded-md text-dark-text  my-5 block">Ver mas</a>
        </div>
      </div>
    </section>
  </main>
<?php
}
?>