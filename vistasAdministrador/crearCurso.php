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
      <h1 class="text-2xl text-dark-text text-center py-6">Crear curso</h1>
      <form action="./php/registrar_curso.php" method="post" class="flex flex-col gap-2 sm:max-w-[500px] sm:mx-auto" id="formCurso" autocomplete="off" enctype="multipart/form-data">
        <div class="w-full flex gap-3">
          <div class="w-full flex flex-col gap-3">
            <div class="w-full">
              <label for="nombre" class="block mb-1 text-dark-text">Nombre</label>
              <input type="text" class="w-full focus:outline-none px-2 py-2 rounded-md text-gray-400 bg-[#555555]" name="nombre" id="nombre">
            </div>
            <div class="w-full">
              <label for="fechaPublicacion" class="block mb-1 text-dark-text">Fecha de publicación</label>
              <input type="date" class="w-full focus:outline-none px-2 py-2 rounded-md text-gray-400 bg-[#555555]" name="fechaPublicacion" id="fechaPublicacion">
            </div>
          </div>
          <div class="w-full">
            <label for="descripcion" class="block mb-1 text-dark-text">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="w-full focus:outline-none px-2 py-2 rounded-md text-gray-400 bg-[#555555] min-h-[100px]  max-h-[100px]"></textarea>
          </div>
        </div>


        <div class="w-full flex items-center gap-3">
          <div class="w-full">
            <label for="imagen" class="block mb-1 text-dark-text">Imagen</label>
            <input type="file" class="w-full focus:outline-none px-2 py-2 rounded-md text-gray-400 bg-[#555555]" name="imagen" id="imagen">
          </div>
          <div class="w-full">
            <label for="duracion" class="block mb-1 text-dark-text">Duración</label>
            <input type="number" class="w-full focus:outline-none px-2 py-2 rounded-md text-gray-400 bg-[#555555]" name="duracion" id="duracion">
          </div>
        </div>

        <div class="w-full flex gap-3">
          <div class="w-full">
            <label for="cupos" class="block mb-1 text-dark-text">Cupos</label>
            <input type="text" class="w-full focus:outline-none px-2 py-2 rounded-md text-gray-400 bg-[#555555]" name="cupos" id="cupos">
          </div>
        </div>

        <div class="w-full my-[22px] flex justify-center items-center">
          <button class="bg-[#ffffff12] text-dark-text px-[8px] py-[4px] rounded-sm" name="enviar">Crear curso</button>
        </div>
      </form>
    </div>
  </main>