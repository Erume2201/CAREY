/**
 * La siguiente función toma el valor ingresado en el campo de entrada y cambia cualquier carácter que no sea un 
 * dígito numérico por un valor vacío. Esto valida que solo se ingresen valores numéricos en el campo evaluado.
 **/
function validarNumeros(input) {
  input.value = input.value.replace(/\D/g, '');
}

/**
 * Genera una contraseña automática con la longitud especificada.
 * @param {number} longitud - La longitud deseada de la contraseña (por defecto: 8).
 * @returns {string} - La contraseña generada.
 */
function generarPass(longitud = 10) {
  const resultadoElemento = document.getElementById('password');
  const caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789#@$!%*?&';
  let contrasena = '';
  const maxCaracteres = caracteres.length - 1;

  for (let i = 0; i < longitud; i++) {
    const indice = Math.floor(Math.random() * (maxCaracteres + 1));
    contrasena += caracteres.charAt(indice);
  }
  resultadoElemento.value = contrasena;
 }


/**
 * Genera una contraseña automática con la longitud especificada para el modulo de recuperar contraseña.
 * @param {number} longitud - La longitud deseada de la contraseña (por defecto: 8).
 * @returns {string} - La contraseña generada.
 */
function generarPassNew(longitud = 10) {
  const id=document.getElementById('id')
  const resultadoElemento = document.getElementById('newPass');
  const resultadoh5 = document.getElementById('h5');
  const resultadoHiden = document.getElementById('pass');
  const caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789#@$!%*?&';
  let contrasena = '';
  const maxCaracteres = caracteres.length - 1;

  for (let i = 0; i < longitud; i++) {
    const indice = Math.floor(Math.random() * (maxCaracteres + 1));
    contrasena += caracteres.charAt(indice);
  }
  resultadoElemento.textContent = contrasena;
  resultadoHiden.value = contrasena;
  resultadoh5.textContent = "Contraseña Nueva: "+contrasena;
 }
