/**
 * la siguiente funcion toma el valor ingresado al campo de entrada y cambia cualquier carácter que no sea un 
 * digito numerico por un valor vacio. Esto para validar que solo se ingresen valores numericos en el campo
 * evaluado.
 **/
function validarNumeros(input) {
  input.value = input.value.replace(/\D/g, '');
}