<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../controller/php/CRUD.php';

//Verificacion de los campos vacios
if (empty($_POST["nombre"]) || empty($_POST["numero"]) || empty($_POST["correo"]) || empty($_POST["password"])|| empty($_POST["rol"]) || empty($_POST["usuario"])) {

    echo "<script>window.location = '../../index.php?module=usuario&Update=NoActualizado'</script>";

}else{
    //Variables que guardan los datos del usuario
     $nombre = $_POST["nombre"];
     $usuario= $_POST["usuario"];
     $numero = $_POST["numero"];
     $correo = $_POST["correo"];
     $password = $_POST["password"];
     $rol = $_POST["rol"];

     echo "<script>window.location = '../../index.php?module=usuario&Update=Actualizado'</script>";
}

?>


<!--
    $encryptedPassword = md5($pass);

    $SQL = "UPDATE usuarios SET  nombre_completo ='$nombre', nombre_usuario = '$usuario',
        telefono_usuario = '$tel', correo = '$email', contrasena = '$encryptedPassword', rol_usuario = '$rol', estatus_usuarios = 'generica' WHERE id_usuarios = $id;";

    $resultado = Actualizar($SQL);
    if ($resultado) {
        echo "<script>window.location = '../../index.php?module=usuario&Update=Actualizado'</script>";
    } else {
        echo "<script>window.location = '../../index.php?module=usuario&Update=NoActualizado'</script>";
    }

--> 