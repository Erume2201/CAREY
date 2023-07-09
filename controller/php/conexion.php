<?php
// Función para obtener una conexión a la base de datos MySQL
function obtenerConexion() {
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $db = "CAREY";

     // Establecer una conexión con la base de datos
    $conexion = mysqli_connect($servidor, $usuario, $password, $db);
    if (!$conexion) {
        die('Error de conexión: ' . mysqli_connect_error());
    }
    // Retornar la conexión
    return $conexion;
}
?>
