<main class="w-full h-auto p-4">
  <h1 class="text-2xl text-dark-text text-center">Login</h1>
  <form action="" method="post" class="flex flex-col gap-2">
    <div class="w-full">
      <label for="usuario" class="block mb-1 text-dark-text">Usuario:</label>
      <input type="text" class="w-full focus:outline-none px-2 py-2 rounded-md" id="usuario">
    </div>
    <div class="w-full">
      <label for="contrasena" class="block mb-1 text-dark-text">Contraseña:</label>
      <input type="password" class="w-full focus:outline-none px-2 py-2 rounded-md" id="contrasena">
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
</main>