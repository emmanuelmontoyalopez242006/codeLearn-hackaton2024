document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("formRegistro");

  form.addEventListener("submit", function (event) {
    const nombres = document.getElementById("nombres").value;
    const apellidos = document.getElementById("apellidos").value;
    const email = document.getElementById("email").value;
    const usuario = document.getElementById("usuario").value;
    const contrasena = document.getElementById("contrasena").value;
    const verificar_contrasena = document.getElementById(
      "verificar_contrasena"
    ).value;

    if (nombres.trim() === "") {
      var mensajeError = document.getElementById("mensaje-error");
      if (mensajeError) {
        mensajeError.innerHTML =
          '<h3 class="bg-red-300 rounded-xl p-4 text-red-600">Por favor digite su nombre</h3>';
        mensajeError.style.display = "hidden";
      }
      event.preventDefault();
      ocultarMensaje();
      return false;
    }

    if (apellidos.trim() === "") {
      var mensajeError = document.getElementById("mensaje-error");
      mensajeError.style.display = "block";
      if (mensajeError) {
        mensajeError.innerHTML =
          '<h3 class="bg-red-300 rounded-xl p-4 text-red-600">Por favor digite sus apellidos</h3>';
        mensajeError.style.display = "hidden";
      }
      event.preventDefault();
      ocultarMensaje();
      return false;
    }

    if (email.trim() === "") {
      var mensajeError = document.getElementById("mensaje-error");
      mensajeError.style.display = "block";
      if (mensajeError) {
        mensajeError.innerHTML =
          '<h3 class="bg-red-300 rounded-xl p-4 text-red-600">Por favor digite su correo electronico</h3>';
        mensajeError.style.display = "hidden";
      }
      event.preventDefault();
      ocultarMensaje();
      return false;
    }

    if (usuario.trim() === "") {
      var mensajeError = document.getElementById("mensaje-error");
      mensajeError.style.display = "block";
      if (mensajeError) {
        mensajeError.innerHTML =
          '<h3 class="bg-red-300 rounded-xl p-4 text-red-600">Por favor digite un usuario</h3>';
        mensajeError.style.display = "hidden";
      }
      event.preventDefault();
      ocultarMensaje();
      return false;
    }

    if (contrasena.trim() === "") {
      var mensajeError = document.getElementById("mensaje-error");
      mensajeError.style.display = "block";
      if (mensajeError) {
        mensajeError.innerHTML =
          '<h3 class="bg-red-300 rounded-xl p-4 text-red-600">Por favor digite su contraseña</h3>';
        mensajeError.style.display = "hidden";
      }
      event.preventDefault();
      ocultarMensaje();
      return false;
    }

    if (verificar_contrasena.trim() === "") {
      var mensajeError = document.getElementById("mensaje-error");
      mensajeError.style.display = "block";
      if (mensajeError) {
        mensajeError.innerHTML =
          '<h3 class="bg-red-300 rounded-xl p-4 text-red-600">Por favor verifique su contraseña</h3>';
        mensajeError.style.display = "hidden";
      }
      event.preventDefault();
      ocultarMensaje();
      return false;
    }

    if (contrasena !== verificar_contrasena) {
      var mensajeError = document.getElementById("mensaje-error");
      mensajeError.style.display = "block";
      if (mensajeError) {
        mensajeError.innerHTML =
          '<h3 class="bg-red-300 rounded-xl p-4 text-red-600">Las contraseñas no coinciden</h3>';
        mensajeError.style.display = "hidden";
      }
      event.preventDefault();
      ocultarMensaje();
      return false;
    }
    // Validación pasada, enviar formulario
    return true;
  });
});

function ocultarMensaje() {
  return setTimeout(function () {
    var mensajeError = document.getElementById("mensaje-error");
    if (mensajeError) {
      mensajeError.classList.remove("animate-fadeOut"); // Remover clase de animación
      mensajeError.classList.add("animate-fadeOut"); // Volver a agregar la clase para reiniciar la animación
      setTimeout(function () {
        mensajeError.style.display = "none"; // Ocultar el mensaje después de la animación
      }, 1000); // Esperar 1 segundo después de la animación
    }
  }, 3000);
}

setTimeout(function () {
  var mensajeError = document.getElementById("mensaje-error-two");
  if (mensajeError) {
    mensajeError.classList.remove("animate-fadeOut"); // Remover clase de animación
    mensajeError.classList.add("animate-fadeOut"); // Volver a agregar la clase para reiniciar la animación
    setTimeout(function () {
      mensajeError.style.display = "none"; // Ocultar el mensaje después de la animación
    }, 1000); // Esperar 1 segundo después de la animación
  }
}, 3000);

// Función para limpiar la URL
// // function limpiarURL() {
//   var nuevaURL = window.location.pathname; // Obtener la parte de la URL antes de los parámetros de consulta

// Reemplazar la URL actual sin los parámetros de consulta
// history.replaceState(null, null, nuevaURL);
// }

// Llamar a la función cuando el documento esté completamente cargado
// document.addEventListener("DOMContentLoaded", function () {
// limpiarURL(); // Llamar a la función para limpiar la URL al cargar la página
// });
