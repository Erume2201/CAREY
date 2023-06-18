<?php
function obtenerConexion() {
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $db = "clanixBD";
    
    $conexion = mysqli_connect($servidor, $usuario, $password, $db);
    if (!$conexion) {
        die('Error de conexión: ' . mysqli_connect_error());
    }
    
    return $conexion;
}
?>
