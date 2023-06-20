<?php
require "conexion.php";
function Consulta($query) {
    $conexion = obtenerConexion();
    // Ejecutar el query
    $resultado = mysqli_query($conexion, $query);

    if (!$resultado) {
        die('Error de consulta: ' . mysqli_error($conexion));
    }

    // Almacenar los resultados en un array
    $resultadosArray = array();
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $resultadosArray[] = $fila;
    }

    mysqli_free_result($resultado);
    mysqli_close($conexion);
    
    // Retornar los resultados
    return $resultadosArray;
}
?>
