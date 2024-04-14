<main class="w-full min-h-screen p-3">
  <?php
  if (isset($_GET['error'])) {
    echo '<p id="mensaje" class="bg-red-300 rounded-xl p-4 text-red-600">' . $_GET['error'] . '</p>';
  } else if (isset($_GET['success'])) {
    echo '<p id="mensaje" class="bg-green-300 rounded-xl p-4 text-green-600">' . $_GET['success'] . '</p>';
  }
  ?>

  <div class="w-full my-9">
    <h3 class="text-gray-400">Tus cursos</h3>
  </div>
  <section class="w-full h-auto flex flex-col justify-center items-center sm:pb-24">
    <div class="flex flex-col flex-wrap p-[22px] mx-auto text-dark-text gap-8 sm:flex-row sm:justify-center sm:items-center">
      <?php include('./php/lstCursosInscritos.php') ?>
    </div>
  </section>
</main>