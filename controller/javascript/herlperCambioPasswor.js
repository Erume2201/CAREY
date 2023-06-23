

/**
 * la siguiente funcion verPassWordActual muestra la conytraseña y cambia el icono en confirPassword
 * con el icono los cambia cada vez que uno da click icon-contrasena
 */
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
   */
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
   */
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
  
  
  
  const campoContrasena = document.getElementById("newPass");
  const campoConfirmarContrasena = document.getElementById("confirPassword");
  const mensajeErrorPass = document.getElementById("mensajeErrorPass");
  const botonIniciarSesion = document.querySelector("button[name='validar']");
  
  campoContrasena.addEventListener("input", function() { 
    validarContrasena(this);
  });
  
  campoConfirmarContrasena.addEventListener("input", function() {
    verificarCoincidenciaContrasena();
  });
  
  function validarContrasena(input) {
    const contrasena = input.value;
  
    // Verificar la longitud de la contraseña
    if (contrasena.length < 6 || contrasena.length > 8) {
      mensajeErrorPass.textContent = "La contraseña debe tener entre 6 y 8 caracteres.";
    } else {
      // Verificar si contiene al menos 1 mayúscula, 1 minúscula y 1 carácter especial
      const tieneMayuscula = /[A-Z]/.test(contrasena);
      const tieneMinuscula = /[a-z]/.test(contrasena);
      const tieneEspecial = /[!@#$%^&*(),.?":{}|<>]/.test(contrasena);
  
      if (!tieneMayuscula || !tieneMinuscula || !tieneEspecial) {
        mensajeErrorPass.textContent = "La contraseña debe incluir al menos 1 mayúscula, 1 minúscula y 1 carácter especial.";
      } else {
        // La contraseña es válida
        mensajeErrorPass.textContent = "La contraseña es válida";
      }
    }
  }
  
  /**
   * verificarCoincidenciaContrasena sirve para validar que ambas contraseñas coincidan
   * compara y si ambas coninciden habilita el boton de iniciar sesion 
   */
  function verificarCoincidenciaContrasena() {
    const contrasena = campoContrasena.value;
    const confirmarContrasena = campoConfirmarContrasena.value;
  
    if (contrasena === confirmarContrasena) {
      mensajeErrorPass.textContent = "Las contraseñas coinciden.";
      botonIniciarSesion.disabled = false;
    } else {
      mensajeErrorPass.textContent = "Las contraseñas no coinciden.";
      botonIniciarSesion.disabled = true;
    }
  }