/**
 * El siguiente linea de código hace los cambios de colores al navbar 'menu general'
 * solicitados por el usuario al momento de colocar el cursor encima
 * de los menú principales. 
 */
  
  function cambiarColor() {
    var elementos = document.querySelectorAll('.navbar-nav .fw-bold');
    
    elementos.forEach(function(elemento) {
      elemento.addEventListener('mouseover', function() {
        this.classList.add('bg-warning');
      });
      
      elemento.addEventListener('mouseout', function() {
        this.classList.remove('bg-warning');
      });
    });
  }
  
  cambiarColor();

//termina submenu


/**
 * El siguiente método muestra la contraseña del input de password
 * no recibe ningun parametro solo agrega un src de las imagenes
 * segun el typo de dato 'password' o 'txt' que contenga se
 * muestra los iconos. 
 */
const verContrasena = () => {
    var tipo = document.getElementById("password");
    if (tipo.type == "password") {
        document.getElementById("icon-contrasena").src = "assets/image/icon/testigo.png";
        tipo.type = "text";
    } else {
        tipo.type = "password";
        document.getElementById("icon-contrasena").src = "assets/image/icon/oculto.png";
    }
};



<<<<<<< Updated upstream
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


const newPassWord = () => {
  var tipo = document.getElementById("newPass");
  if (tipo.type == "password") {
      document.getElementById("icon-contrasena").src = "assets/image/icon/testigo.png";
      tipo.type = "text";
  } else {
      tipo.type = "password";
      document.getElementById("icon-contrasena").src = "assets/image/icon/oculto.png";
  }
};

const confirmarPassWord = () => {
  var tipo = document.getElementById("confirPassword");
  if (tipo.type == "password") {
      document.getElementById("icon-contrasena").src = "assets/image/icon/testigo.png";
      tipo.type = "text";
  } else {
      tipo.type = "password";
      document.getElementById("icon-contrasena").src = "assets/image/icon/oculto.png";
  }
};


=======

//-----------Codigo de Validacion--------------//
/**
 * La siguiente función toma el valor ingresado en el campo de entrada y evalúa los caracteres ingresados, mostrando 
 * un mensaje de error hasta que se cumplan las condiciones establecidas.
 **/
  const passwordInput = document.querySelector("#password");
  const mensajeError = document.getElementById('mensajeErrorPass');

  passwordInput.addEventListener("input", function() {
    const password = passwordInput.value;
    const validar = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    
    if (!validar.test(password)) {
      mensajeError.textContent = "La contraseña debe cumplir con los siguientes requisitos: " +
        "debe contener al menos una letra mayúscula, una letra minúscula, " +
        "un carácter especial y un número. Además, la longitud mínima de la " +
        "contraseña debe ser de 8 caracteres. " +
        "Asegúrate de cumplir con estos requisitos al elegir tu " +
        "contraseña para garantizar su seguridad.";
    } else {
      mensajeError.textContent = "";
    }
  });

/**
 * La siguiente función toma el valor ingresado en el campo de entrada y evalúa que los caracteres ingresados sean 
 * los mismos que se ingresaron en el campo de password, mostrando un mensaje de error hasta que se cumplan 
 * las condiciones establecidas.
 **/
const passInput = document.querySelector("#passConf");
const mensajeValidarPass = document.getElementById('mensajeValidarPass');

passInput.addEventListener("input", function() {
  const pass = passInput.value;
  if (pass === passwordInput.value) {
    mensajeValidarPass.textContent = "";
  } else {
    mensajeValidarPass.textContent = "Las contraseñas no coinciden. " +
      "Asegúrate de ingresar la misma contraseña en ambos campos.";
  }
});
>>>>>>> Stashed changes
