<?php
// Obtener los valores enviados por el formulario
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../controller/php/CRUD.php'; 

if (isset( $_POST['name']) && isset( $_POST['Precio']) && isset( $_POST['mensaje'])&&
   isset( $_POST['Tipo'])
   ) {
    
    $nombre = $_POST['name'];
    $precio = $_POST['Precio'];
    $descripcion = $_POST['mensaje'];
    $tipo = $_POST['Tipo'];

    $SQL = "INSERT INTO articulo_documetos (nombre, precio_costo, descripcion, tipo) 
        VALUES ('$nombre', $precio, '$descripcion', '$tipo')";   
    $resultado=InsertarDato($SQL);
    if ($resultado) {
        echo "<script>window.location = '../../index.php?module=articulo&status=Insertado'</script>";
    }else{
        echo "<script>window.location = '../../index.php?module=articulo&status=NoInsertado'</script>";
    }

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dato = $_POST["dato"];
    // Procesar el dato específico según el form_id
    echo "El dato enviado para el formulario con ID es: " . $dato;
  }



?>