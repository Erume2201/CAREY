<?php
/*
if(isset($_REQUEST['validar'])){
    $user_login = $_POST["user"];
    $password_login = md5($_POST["password"]);
    
    $SQL = "SELECT usuario, contrasena FROM usuarios 
                WHERE usuario = '$user_login' 
                AND contrasena = '$password_login'";
    $validacionUsuario = validarUsuario($SQL);
    
    if($validacionUsuario ==1){
        echo "valdiado";
        session_start();
        $_SESSION['s1'] = $_POST["user"];
        header("Location: controller/php/controlSesion.php");


    }else{
        echo "<script>alert('usuario o contraseña incorrecto')</script>";
    }
}

require 'view/login/login.php';

*/
?>