<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../controller/php/CRUD.php';

//Verificacion de los campos vacios
if (empty($_POST["dato"]) || empty($_POST["pass"])) {

    echo "<script>window.location = '../../index.php?module=recuperarUserPass&Update=NoActualizado'</script>";

}else{
    //Variables que guardan los datos del usuario
     $id = $_POST["dato"];
     $pass= $_POST["pass"];

     $encryptedPassword = md5($pass);

     $SQL = "UPDATE usuarios SET contrasena = '$encryptedPassword', estatus_usuarios = 'generica' 
     		WHERE id_usuarios = $id;";

     $resultado = Actualizar($SQL);
     if ($resultado) {
         echo "<script>window.location = '../../index.php?module=recuperarUserPass&Update=Actualizado'</script>";
     } else {
         echo "<script>window.location = '../../index.php?module=recuperarUserPass&Update=NoActualizado'</script>";
     }
}

?>