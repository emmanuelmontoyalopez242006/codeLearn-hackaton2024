<main class="w-full h-screen p-4 flex justify-center items-center">
  <div class="w-full h-auto">
    <?php
    if (isset($_GET['error'])) {
      echo '<p id="mensaje-error-two" class="bg-red-300 rounded-xl p-4 text-red-600">' . $_GET['error'] . '</p>';
    }
    ?>
    <h1 class="text-2xl text-dark-text text-center">Login</h1>
    <form action="./php/loguear_usuario.php" method="post" class="flex flex-col gap-2 sm:max-w-[500px] sm:mx-auto" id="formLogin">
      <div class="w-full">
        <label for="usuario" class="block mb-1 text-dark-text">Usuario:</label>
        <input type="text" class="w-full focus:outline-none px-2 py-2 rounded-md text-gray-100 bg-[#555555]" id="usuario" name="usuario">
      </div>
      <div class="w-full">
        <label for="contrasena" class="block mb-1 text-dark-text">Contraseña:</label>
        <input type="password" class="w-full focus:outline-none px-2 py-2 rounded-md text-gray-100 bg-[#555555]" id="contrasena" name="contrasena">
      </div>
      <div class="w-full">
        <p class="text-[#ffffff52]">Aun no tengo cuenta <a href="?vista=register" class="text-[#0099ff99]">Crear una</a></p>
      </div>
      <div class="w-full">
        <a href="?vista=login" class="text-[#0099ff99]">Olvidaste tu contraseña?</a>
      </div>
      <div class="w-full my-[22px] flex justify-center items-center">
        <button class="bg-[#ffffff12] text-dark-text px-[8px] py-[4px] rounded-sm">Iniciar sesión</button>
      </div>
    </form>
  </div>
</main>
<script src="./js/login.js"></script>