<script>
  setTimeout(function() {
    var mensaje = document.getElementById("mensaje");
    if (mensaje) {
      mensaje.classList.remove("animate-fadeOut"); // Remover clase de animación
      mensaje.classList.add("animate-fadeOut"); // Volver a agregar la clase para reiniciar la animación
      setTimeout(function() {
        mensaje.style.display = "none"; // Ocultar el mensaje después de la animación
      }, 1000); // Esperar 1 segundo después de la animación
    }
  }, 3000);

  // // Reemplazar la URL actual sin agregar una nueva entrada en el historial
  // function limpiarURL() {
  //   var nuevaURL = window.location.protocol + "//" + window.location.host + window.location.pathname;
  //   window.history.replaceState({
  //     path: nuevaURL
  //   }, '', nuevaURL);
  // }

  // // Llamar a la función para limpiar la URL
  // limpiarURL();
</script>