<main class="w-full h-screen">
  <?php
  if (isset($_GET['success'])) {
    echo '<p id="mensaje" class="bg-green-300 rounded-xl p-4 text-green-600">' . $_GET['success'] . '</p>';
  }
  ?>
  <div class="w-full h-full flex flex-col justify-center items-center gap-3 text-dark-text sm:gap-6">
    <h1 class="text-4xl text-center font-semibold">Tu ruta de aprendizaje <br> como programador comienza aqui</h1>
    <p class="w-[320px] text-center text-1xl sm:w-[500px] sm:text-2xl">Si te interesa todo lo que tiene que ver con el desarrollo web y la programación en general, has llegado al lugar correcto, en codeLearn te enseñamos las bases de la programación y un poco mas... 💻🤩</p>
    <p class="sm:text-xl">"Expande tu código, expande tu mundo."</p>
    <p class="font-semibold text-1xl">- codeLearn 2024</p>
  </div>
</main>

<section class="w-full h-auto sm:pb-24">
  <h2 class="text-dark-text text-center text-4xl mb-11">Nuestra forma de trabajo</h2>
  <div class="w-full h-full mx-auto mb-40 flex flex-col flex-wrap justify-evenly items-center gap-10 sm:flex-row">
    <article class="bg-dark-primary text-dark-text text-center flex flex-col justify-center items-center gap-3">
      <img src="./img/book.svg" alt="Logo de un libro" class="w-[200px]">
      <h2 class="text-2xl font-bold">Aprendizaje</h2>
      <p class="w-[300px]">Te brindaremos todas las lecciones necesarias para que puedas avanzar de manera eficiente y rapida.</p>
    </article>
    <article class="bg-dark-primary text-dark-text text-center flex flex-col justify-center items-center gap-3">
      <img src="./img/computer.svg" alt="Logo de un computador" class="w-[200px]">
      <h2 class="text-2xl font-bold">Practica</h2>
      <p class="w-[300px]">Una de las mejores maneras de aprender algo es practicando y practicando, para esto te brindaremos ejercicios para que practiques.</p>
    </article>
    <article class="bg-dark-primary text-dark-text text-center flex flex-col justify-center items-center gap-3">
      <img src="./img/project.svg" alt="Logo de un proyecto" class="w-[200px]">
      <h2 class="text-2xl font-bold">Muchos proyectos</h2>
      <p class="w-[300px]">Luego de haber aprendido y a su vez praticado, la ultima etapa seria la creación de proyectos reales.</p>
    </article>
  </div>
</section>

<section class="w-full h-auto flex flex-col justify-center items-center sm:pb-24">
  <h2 class="text-2xl mx-6 mt-8 text-dark-text text-center">Algunos de nuestros cursos</h2>
  <div class="flex flex-col flex-wrap p-[22px] mx-auto text-dark-text gap-8 sm:flex-row sm:justify-center sm:items-center">
    <?php include('./php/lstCursos.php') ?>
  </div>
</section>

<footer class="w-full h-auto bg-[#ffffff12] p-[6px]">
  <div class="w-full text-dark-text flex flex-col justify-center items-center gap-3">
    <a href="index.php?vista=index" class="inline-flex justify-center items-center">
      <img src="./img/logo.svg" alt="Logo de codeLearn" class="w-[42px]">
      <p class="font-semibold">codeLearn</p>
    </a>
    <p class="text-[10px]">@ 2024 codeLearn | Todos los derechos reservados</p>
    <p>Echo con el 💓 por Emmanuel Montoya</p>
  </div>
</footer>