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
}


