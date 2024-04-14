  <main class="w-full h-screen p-4 flex justify-center items-center">
    <div class="w-full h-auto">
      <?php
      if (isset($_GET['error'])) {
        echo '<p id="mensaje-error-two" class="bg-red-300 rounded-xl p-4 text-red-600">' . $_GET['error'] . '</p>';
      } else if (isset($_GET['success'])) {
        echo '<p id="mensaje-error-two" class="bg-green-300 rounded-xl p-4 text-green-600">' . $_GET['success'] . '</p>';
      }
      ?>
      <p id='mensaje-error' class='animate-fadeOut'></p>
      <h1 class="text-2xl text-dark-text text-center">Registro</h1>
      <form action="./php/registrar_usuario.php" method="post" class="flex flex-col gap-2 sm:max-w-[500px] sm:mx-auto" id="formRegistro" autocomplete="off">
        <div class="w-full">
          <label for="nombres" class="block mb-1 text-dark-text">Nombres:</label>
          <input type="text" class="w-full focus:outline-none px-2 py-2 rounded-md text-gray-400 bg-[#555555]" name="nombres" id="nombres" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,30}" maxlength="30">
        </div>
        <div class="w-full">
          <label for="apellidos" class="block mb-1 text-dark-text">Apellidos:</label>
          <input type="text" class="w-full focus:outline-none px-2 py-2 rounded-md text-gray-400 bg-[#555555]" name="apellidos" id="apellidos" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,30}" maxlength="30">
        </div>
        <div class="w-full">
          <label for="apellidos" class="block mb-1 text-dark-text">Email:</label>
          <input type="email" class="w-full focus:outline-none px-2 py-2 rounded-md text-gray-400 bg-[#555555]" name="email" id="email" maxlength="30">
        </div>
        <div class="w-full">
          <label for="usuario" class="block mb-1 text-dark-text">Usuario:</label>
          <input type="text" class="w-full focus:outline-none px-2 py-2 rounded-md text-gray-400 bg-[#555555]" name="usuario" id="usuario" pattern="[a-zA-Z0-9]{3,30}" maxlength="20">
        </div>
        <div class="w-full">
          <label for="contrasena" class="block mb-1 text-dark-text">Contraseña:</label>
          <input type="password" class="w-full focus:outline-none px-2 py-2 rounded-md text-gray-400 bg-[#555555]" name="contrasena" id="contrasena">
        </div>
        <div class="w-full">
          <label for="verificar_contrasena" class="block mb-1 text-dark-text">Verificar contraseña:</label>
          <input type="password" class="w-full focus:outline-none px-2 py-2 rounded-md text-gray-400 bg-[#555555]" id="verificar_contrasena">
        </div>
        <div class="w-full">
          <p class="text-[#ffffff52]">Ya tengo una <a href="?vista=login" class="text-[#0099ff99]">Iniciar sesión</a></p>
        </div>
        <div class="w-full my-[22px] flex justify-center items-center">
          <button class="bg-[#ffffff12] text-dark-text px-[8px] py-[4px] rounded-sm" name="enviar">Crear cuenta</button>
        </div>
      </form>
    </div>
  </main>
  <script src="./js/register.js"></script>