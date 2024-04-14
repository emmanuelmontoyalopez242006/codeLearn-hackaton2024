<?php
$idCurso = $_GET['id'];
$curso = conexion();
$curso = $curso->query("SELECT * FROM cursos WHERE id=" . $idCurso);
if ($curso->rowCount() > 0) {
  $curso = $curso->fetch();
?>
  <main class="w-full min-h-screen p-5 text-center">
    <h1 class="text-gray-400 text-xl">Estas seguro de que deseas inscribir el curso de <?php echo $curso['nombre'] ?></h1>
    <div class="flex justify-center items-center gap-4 mt-5">
      <a href="./php/inscribirCurso.php?id=<?php echo $curso['id'] ?>" class="px-5 bg-red-400 text-dark-text rounded-md">Si</a>
      <a href="index.php?vista=perfilUser" class="px-5 bg-green-400 text-dark-text rounded-md">No</a>
    </div>
  </main>

<?php
}
?>