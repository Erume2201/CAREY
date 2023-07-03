<?php
// Obtener los valores enviados por el formulario

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
    $buscar = "SELECT documentos_id FROM informacion_venta 
    WHERE documentos_id='$dato';";
    $Buscador = Consulta($buscar);
    if (empty($buscar)) {
        // El código a ejecutar si la variable está vacía
          $SQL  = "DELETE FROM documentos WHERE id_articulo_documetos = '$dato';";
          $resultado = EliminarDato($SQL);
        if ($resultado) {
        echo "<script>window.location = '../../index.php?module=articulo&Delete=Borrado'</script>";
        }else{
        echo "<script>window.location = '../../index.php?module=articulo&Delete=NoBorrado'</script>";
        }
    }else{
      echo "<script>window.location = '../../index.php?module=articulo&Delete=NoBorrado'</script>";
    }

  }



?>