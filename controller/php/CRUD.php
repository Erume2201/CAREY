<?php
//obtenemos  el archivo conexion.php para poder obtener la conexion
require "conexion.php";
//esta funcion solo  hace consultas,  el cual recibe un query


/**NOTA UNITARIA: SI ES NECESARIO MANTENER
 * La siguiente función es la principal ya que es la que va a dar acceso
 * al usuario y valida si existe una sesion activa
 * recibe de parametro usuario y contraseña
 * Efren rm
 */
/*
 function validarUsuario($query){
    $conexion = obtenerConexion();
    $resultado = mysqli_query($conexion, $query);
    if (!$resultado) {
        die('Error de consulta: ' . mysqli_error($conexion));
    }
    mysqli_close($conexion);

    if (mysqli_fetch_assoc($resultado)) {
        return 1;
    }
    return 0;
}
*/



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

function InsertarDato($query) {
    
    $conexion = obtenerConexion();

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error al conectar con la base de datos: " . $conexion->connect_error);
    }
    // Ejecutar la consulta
    if ($conexion->query($query) === TRUE) {
        return true;
    } else {
        return false;
    }

    // Cerrar la conexión
    $conexion->close();
}

function EliminarDato($query) {
    $conexion = obtenerConexion();

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error al conectar con la base de datos: " . $conexion->connect_error);
    }

    // Ejecutar la consulta
    if ($conexion->query($query) === TRUE) {
        $conexion->close();
        return true;
    } else {
        $conexion->close();
        return false;
    }
}

function insertarDatosDoble($query1) {
    $conexion = obtenerConexion();
    if ($conexion->query($query1) === true) {
        // Obtener la llave primaria generada automáticamente
        $llavePrimaria = $conexion->insert_id;
        // Cerrar la conexión con la base de datos
        $conexion->close();
        // Retornar la llave primaria del dato insertado
        return $llavePrimaria;
    } else {
        echo "Error al insertar el dato: " . $conexion->error;
    }

    // Cerrar la conexión con la base de datos
    $conexion->close();
    return null; //
}
?>