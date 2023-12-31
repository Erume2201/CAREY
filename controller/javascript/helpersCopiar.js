/**
 * Genera una accion de copiado al portapapeles
 * @param {number} longitud - La longitud deseada a copiar.
 * @returns {string} - mensaje de copiado.
 */
function Checando(longitud = 10) {
  const resultadoElemento = document.getElementById('password');
  const msj = document.getElementById('copiar');

  resultadoElemento.focus();
  document.execCommand('SelectAll');
  document.execCommand('copy');
  msj.innerHTML = "<span>Contraseña Copiada<br><br></span>";

  setTimeout(()=> msj.innerHTML = "" , 1000);
 }

/**
 * Genera una accion de copiado al portapapeles para el modal de recuperar contraseña.
 * @param {number} longitud - La longitud deseada a copiar.
 * @returns {string} - mensaje de copiado.
 */
function ChecandoModal(event,longitud = 10) {
  const button = event.target;
  const resultadoHiden = document.getElementById('pass'+button.value);
  const msj = document.getElementById('copiar'+button.value);
  const valorOculto = resultadoHiden.value;

  resultadoHiden.select();
  navigator.clipboard.writeText(valorOculto)
    .then(() => {
      msj.innerHTML = "<span>Contraseña Copiada<br></span>";
      setTimeout(() => msj.innerHTML = "", 1000);
    })
    .catch((error) => {
      console.error("Error al copiar al portapapeles:", error);
    });
 }
 

 
