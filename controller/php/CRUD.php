<?php
//obtenemos  el archivo conexion.php para poder obtener la conexion
require "conexion.php";
//esta funcion solo  hace consultas,  el cual recibe un query
function Consulta($query) {
    //obtenemos la funcion obtenerConexion que esta retorna la conexion del archivo conexion.php
    $conexion = obtenerConexion();
    // Ejecutar el query la palabra mysqli_query son palabras reservadas
    $resultado = mysqli_query($conexion, $query);
    //este apartado se ve si se pudo realizar la consulta
    if (!$resultado) {
        die('Error de consulta: ' . mysqli_error($conexion));
    }
    //declaramos un array()
    $resultadosArray = array();
    // Almacenar los resultados en un array
    while ($fila = mysqli_fetch_assoc($resultado)) {
        //se alamacena todas las filas de la consulta
        $resultadosArray[] = $fila;
    }
   //baseamos el $resultado ya que esta consulta 
   //se hace del lado del servidor y con esto liberamos memoria
    mysqli_free_result($resultado);
   //cerramos la conexion
    mysqli_close($conexion);
    
    // Retornar los resultados que obtuvimos de la consulta pero esto son los que se almacenaron en 
    //el array
    return $resultadosArray;
}
/**
 * Este metodo sirve para actualizar el estatus del usuario
 * recibe como parametro el correo electronico
 * retorna un booleano
 */
function Actualizar($query) {
    $conexion = obtenerConexion();
    $resultado = mysqli_query($conexion, $query);
    if (!$resultado) {
        die('Error de consulta: ' . mysqli_error($conexion));
    }

    $filasAfectadas = mysqli_affected_rows($conexion);

    mysqli_close($conexion);

    // Si se afectaron más de 0 filas, se devuelve true; de lo contrario, se devuelve false.
    if  ($filasAfectadas > 0)
        return true;
    else    
        return false;
}

function Insertar($query) {
    $conexion = obtenerConexion();
    $resultado = mysqli_query($conexion, $query);
    
    if (!$resultado) {
        die('Error de consulta: ' . mysqli_error($conexion));
    }

    $resultadoInsertar = mysqli_affected_rows($conexion);

    mysqli_close($conexion);

    // Resultado si se inserto el dato del documento
    if  ($resultadoInsertar > 0)
        return true;
    else    
        return false;
}


?>