<?php
// Configuración para mostrar errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Requerir el archivo CRUD.php
error_reporting(E_ALL);
require '../../controller/php/CRUD.php';

//Verificacion de los campos vacios
if (empty($_POST["nombre"]) || empty($_POST["numero"]) || empty($_POST["correo"]) || empty($_POST["password"])|| empty($_POST["rol"]) || empty($_POST["estado"]) || empty($_POST["usuario"])) {

    echo "<script>window.location = '../../index.php?module=usuario&Update=NoActualizado'</script>";

}else{
    //Variables que guardan los datos del usuario
     $nombre = $_POST["nombre"];
     $usuario= $_POST["usuario"];
     $numero = $_POST["numero"];
     $correo = $_POST["correo"];
     $password = $_POST["password"];
     $rol = $_POST["rol"];
     $estado = $_POST["estado"];
     $id = $_POST['dato'];
     //Encriptamos la contraseña
     $encryptedPassword = md5($password);

     $SQL = "UPDATE usuarios SET  nombre_completo ='$nombre', nombre_usuario = '$usuario',
        telefono_usuario = '$numero', correo = '$correo', contrasena = '$encryptedPassword', 
        rol_usuario = '$rol', estado_usuario = '$estado', estatus_usuarios = 'generica' WHERE id_usuarios = $id;";

     $resultado = Actualizar($SQL);
     //verificamos la respuesta a de la bd
     if ($resultado) {
         echo "<script>window.location = '../../index.php?module=usuario&Update=Actualizado'</script>";
     } else {
         echo "<script>window.location = '../../index.php?module=usuario&Update=NoActualizado'</script>";
     }
}

?>
