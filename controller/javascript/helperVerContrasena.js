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
