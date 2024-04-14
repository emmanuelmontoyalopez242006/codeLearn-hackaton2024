<nav class="w-full h-auto bg-dark-primary flex justify-between items-center py-3 sticky top-0">
  <ul class="mx-2">
    <a href="index.php?vista=perfilUser" class="inline-flex justify-center items-center text-dark-text">
      <img src="./img/logo.svg" alt="Logo de codeLearn" class="w-[42px]">
      <p class="font-semibold">codeLearn de <?php echo $_SESSION['usuario'] ?></p>
    </a>
  </ul>
  <ul class="flex gap-6 mx-4 text-dark-text">
    <li><a href="index.php?vista=misCursos" class="transition-colors hover:border-b-2">Mis cursos</a></li>
    <li><a href="index.php?vista=miPerfil" class="transition-colors hover:border-b-2">Mi perfil</a></li>
    <li><a href="index.php?vista=logout" class="text-red-500">Cerrar sesion</a></li>
  </ul>
</nav>