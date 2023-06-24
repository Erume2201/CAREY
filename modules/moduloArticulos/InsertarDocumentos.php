<?php
// Obtener los valores enviados por el formulario
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../controller/php/CRUD.php'; 

if (isset( $_POST['nombre']) && isset( $_POST['PrecioCosto'])&& isset($_POST['PrecioVenta']) && 
    isset( $_POST['mensaje'])&& isset( $_POST['Tipo'])
   ) {
    
    $nombre = $_POST['nombre'];
    $precio_costo = $_POST['PrecioCosto'];
    $precio_venta = $_POST['PrecioVenta'];
    $descripcion = $_POST['mensaje'];
    $tipo = $_POST['Tipo'];

    $SQL = "INSERT INTO documentos (nombre, precio_costo, precio_venta, descripcion, tipo) 
        VALUES ('$nombre', $precio_costo , $precio_venta, '$descripcion', '$tipo')";  

    $resultado=InsertarDato($SQL);
    if ($resultado) {
        echo "<script>window.location = '../../index.php?module=articulo&status=Insertado'</script>";
    }else{
        echo "<script>window.location = '../../index.php?module=articulo&status=NoInsertado'</script>";
    }

}

if (isset($_POST['dato'])) {
    $dato = $_POST["dato"];
    
    $SQL  = "DELETE FROM documentos WHERE id_articulo_documetos = '$dato';";
    $resultado = EliminarDato($SQL);
    if ($resultado) {
       echo "<script>window.location = '../../index.php?module=articulo&Delete=Borrado'</script>";
    }else{
       echo "<script>window.location = '../../index.php?module=articulo&Delete=NoBorrado'</script>";
    }
  }



?>