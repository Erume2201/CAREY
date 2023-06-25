const campoContrasena = document.getElementById("newPass");
const campoConfirmarContrasena = document.getElementById("confirPassword");
const mensajeErrorPass = document.getElementById("mensajeErrorPass");
const botonIniciarSesion = document.getElementById("validar");

campoContrasena.addEventListener("input", function() {
  validarContrasena(campoContrasena.value);
});

function validarContrasena(passw) {
  const contrasena = passw;

  // Verificar la longitud de la contraseña
  if (contrasena.length < 6 || contrasena.length > 8) {
    mensajeErrorPass.textContent = "La contraseña debe tener entre 6 y 8 caracteres.";
    mensajeErrorPass.classList.remove("text-success"); // Remover clase de éxito
    mensajeErrorPass.classList.add("text-danger"); // Agregar clase de error
    botonIniciarSesion.disabled = true; // Deshabilitar el botón
  } else {
    // Verificar si contiene al menos 1 mayúscula, 1 minúscula, 1 carácter especial y 1 número
    const tieneMayuscula = /[A-Z]/.test(contrasena);
    const tieneMinuscula = /[a-z]/.test(contrasena);
    const tieneEspecial = /[!@#$%^&*(),.?":{}|<>]/.test(contrasena);
    const tieneNumero = /\d/.test(contrasena);

    if (!tieneMayuscula || !tieneMinuscula || !tieneEspecial || !tieneNumero) {
      mensajeErrorPass.textContent = "La contraseña debe incluir al menos 1 número, 1 mayúscula, 1 minúscula y 1 carácter especial.";
      mensajeErrorPass.classList.remove("text-success"); // Remover clase de éxito
      mensajeErrorPass.classList.add("text-danger"); // Agregar clase de error
      botonIniciarSesion.disabled = true; // Deshabilitar el botón
    } else {
      // La contraseña es válida
      mensajeErrorPass.textContent = "La contraseña es válida";
      mensajeErrorPass.classList.remove("text-danger"); // Remover clase de error
      mensajeErrorPass.classList.add("text-success"); // Agregar clase de éxito
      botonIniciarSesion.disabled = false; // Habilitar el botón
    }
  }
}
const verPassWordActual = () => {
  var tipo = document.getElementById("passActual");
  if (tipo.type === "password") {
    document.getElementById("icon-contrasena").src = "assets/image/icon/testigo.png";
    tipo.type = "text";
  } else {
    tipo.type = "password";
    document.getElementById("icon-contrasena").src = "assets/image/icon/oculto.png";
  }
};

const newPassWord = () => {
  var tipo = document.getElementById("newPass");
  if (tipo.type === "password") {
    document.getElementById("icon-contrasena1").src = "assets/image/icon/testigo.png";
    tipo.type = "text";
  } else {
    tipo.type = "password";
    document.getElementById("icon-contrasena1").src = "assets/image/icon/oculto.png";
  }
};

const confirmarPassWord = () => {
  var tipo = document.getElementById("confirPassword");
  if (tipo.type === "password") {
    document.getElementById("icon-contrasena2").src = "assets/image/icon/testigo.png";
    tipo.type = "text";
  } else {
    tipo.type = "password";
    document.getElementById("icon-contrasena2").src = "assets/image/icon/oculto.png";
  }
};

function validarCamp() {
  var form = document.getElementById('myForm');
  const newPassword = document.querySelector('#newPass');
  const confirmPassword = document.querySelector('#confirPassword');
  if (newPassword.value === confirmPassword.value) {
    // Crea la URL con el parámetro
    var actionURL = 'index.php?module=cambioPassword';
    // Agrega la URL al atributo "action" del formulario
    form.action = actionURL;
    form.submit(); // Envía el formulario
  } else {
    var actionURL = 'index.php?module=errorCambioPassword';
    // Agrega la URL al atributo "action" del formulario
    form.action = actionURL;
    form.submit(); // Envía el formulario
     
   
  }
}




/**
 * la siguiente funcion verPassWordActual muestra la conytraseña y cambia el icono en confirPassword
 * con el icono los cambia cada vez que uno da click icon-contrasena
 *
const verPassWordActual = () => {
    var tipo = document.getElementById("passActual");
    if (tipo.type == "password") {
        document.getElementById("icon-contrasena").src = "assets/image/icon/testigo.png";
        tipo.type = "text";
    } else {
        tipo.type = "password";
        document.getElementById("icon-contrasena").src = "assets/image/icon/oculto.png";
    }
  };
  
  /**
   * la función newPassWord  muestra la conytraseña y cambia el icono en confirPassword
   * con el icono los cambia cada vez que uno da click icon-contrasena1
   *
  const newPassWord = () => {
    var tipo = document.getElementById("newPass");
    if (tipo.type == "password") {
        document.getElementById("icon-contrasena1").src = "assets/image/icon/testigo.png";
        tipo.type = "text";
    } else {
        tipo.type = "password";
        document.getElementById("icon-contrasena1").src = "assets/image/icon/oculto.png";
    }
  };
  /**
   * la funcion confirmarPassWord muestra la conytraseña y cambia el icono en confirPassword
   * con el icono los cambia cada vez que uno da click icon-contrasena2
   *
  const confirmarPassWord = () => {
    var tipo = document.getElementById("confirPassword");
    if (tipo.type == "password") {
        document.getElementById("icon-contrasena2").src = "assets/image/icon/testigo.png";
        tipo.type = "text";
    } else {
        tipo.type = "password";
        document.getElementById("icon-contrasena2").src = "assets/image/icon/oculto.png";
    }
  };
  
  
  
  //-----------Codigo de Validacion--------------//
  /**
   * La siguiente función toma el valor ingresado en el campo de entrada y evalúa los caracteres ingresados, mostrando 
   * un mensaje de error hasta que se cumplan las condiciones establecidas.
   **/
  
 /* 
const campoContrasena = document.getElementById("newPass");
const campoConfirmarContrasena = document.getElementById("confirPassword");
const mensajeErrorPass = document.getElementById("mensajeErrorPass");
const botonIniciarSesion = document.getElementById("validar");

campoContrasena.addEventListener("input", function() {
  validarContrasena(campoContrasena.value);
});

function validarContrasena(passw) {
  const contrasena = passw;

  // Verificar la longitud de la contraseña
  if (contrasena.length < 6 || contrasena.length > 8) {
    mensajeErrorPass.textContent = "La contraseña debe tener entre 6 y 8 caracteres.";
    mensajeErrorPass.classList.remove("text-success"); // Remover clase de éxito
    mensajeErrorPass.classList.add("text-danger"); // Agregar clase de error
    botonIniciarSesion.disabled = true; // Deshabilitar el botón
  } else {
    // Verificar si contiene al menos 1 mayúscula, 1 minúscula, 1 carácter especial y 1 numero
    const tieneMayuscula = /[A-Z]/.test(contrasena);
    const tieneMinuscula = /[a-z]/.test(contrasena);
    const tieneEspecial = /[!@#$%^&*(),.?":{}|<>]/.test(contrasena);
    const tieneNumero = /[0-9]/.test(contrasena);

    if (!tieneMayuscula || !tieneMinuscula || !tieneEspecial || !tieneNumero) {
      mensajeErrorPass.textContent = "La contraseña debe incluir al menos 1 numero, 1 mayúscula, 1 minúscula y 1 carácter especial.";
      mensajeErrorPass.classList.remove("text-success"); // Remover clase de éxito
      mensajeErrorPass.classList.add("text-danger"); // Agregar clase de error
      botonIniciarSesion.disabled = true; // Deshabilitar el botón
    } else {
      // La contraseña es válida
      mensajeErrorPass.textContent = "La contraseña es válida";
      mensajeErrorPass.classList.remove("text-danger"); // Remover clase de error
      mensajeErrorPass.classList.add("text-success"); // Agregar clase de éxito
      botonIniciarSesion.disabled = false; // Habilitar el botón
    }
  }
}

*/
/**
 * la funcion validarCampo valida
 * que los campos newPass y confirmasPass
 * sean los mismos si son los mismos manda el formulario si no da error
 *
  function validarCamp() {
    const newPassword = document.querySelector('#newPass');
    const confirmPassword = document.querySelector('#confirPassword');
    if (newPassword.value === confirmPassword.value) {
      // Las contraseñas coinciden, enviar el formulario
      var form = document.getElementById('myForm');
      // Crea la URL con el parametro
      var actionURL = 'index.php?module=cambioPassword';
      // Agrega la URL al atributo "action" del formulario
      form.action = actionURL;
      document.getElementById('validar').parentNode.submit(); // Envía el formulario
    } else {
      mensajeErrorPass.textContent = "La contraseñas no coinciden";
     // location.reload();
    }
  }
 */