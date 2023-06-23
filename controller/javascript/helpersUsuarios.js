/**
 * La siguiente función toma el valor ingresado en el campo de entrada y cambia cualquier carácter que no sea un 
 * dígito numérico por un valor vacío. Esto valida que solo se ingresen valores numéricos en el campo evaluado.
 **/
function validarNumeros(input) {
  input.value = input.value.replace(/\D/g, '');
}

