<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$db ="clanix";
$conexion = mysqli_connect($servidor, $usuario, $password, $db) or 
die(mysqli_error($conexion));

if ($conexion) {
    echo "realizado";
}else{
    echo "error";
}

?>

