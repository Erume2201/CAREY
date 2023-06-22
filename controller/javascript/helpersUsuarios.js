/**
 * la siguiente funcion toma el valor ingresado al campo de entrada y cambia cualquier carácter que no sea un 
 * digito numerico por un valor vacio. Esto para validar que solo se ingresen valores numericos en el campo
 * evaluado.
 **/
function validarNumeros(input) {
  input.value = input.value.replace(/\D/g, '');
}

/**
 * la siguiente funcion toma el valor ingresado al campo de entrada y evalua los caracteres ingresados mostrando 
 * un mensaje de error hasta que se cumpla las condiciones establecidas.
 **/
const passwordInput = document.querySelector("#password");
const mensajeError = document.getElementById('mensajeErrorPass');

passwordInput.addEventListener("input", function() {
  const password = passwordInput.value;
  const validar = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
  
  if (!validar.test(password)) {
    mensajeError.textContent = "La contraseña debe cumplir con los siguientes requisitos: "
                                +"debe contener al menos una letra mayúscula, una letra minúscula, "+
                                "un carácter especial y un número. Además, la longitud mínima de la "+
                                "contraseña debe ser de 8 caracteres. "+
                                "Asegúrate de cumplir con estos requisitos al elegir tu "+
                                "contraseña para garantizar su seguridad.";
  } else {
    mensajeError.textContent = "";
  }
});

/**
 * la siguiente funcion toma el valor ingresado al campo de entrada y evalua que los caracteres ingresados sean 
 * los mismos que se ingresaron en el campo de password, mostrando un mensaje de error hasta que se cumpla 
 * las condiciones establecidas.
 **/
const passInput = document.querySelector("#passConf");
const mensajeValidarPass = document.getElementById('mensajeValidarPass');

passInput.addEventListener("input", function() {
  const pass = passInput.value;
  //const validarpass = pass;
  if (pass==passwordInput.value) {
    mensajeValidarPass.textContent = "";
  } else {
    mensajeValidarPass.textContent = "Las contraseñas no coinciden";
  }
});