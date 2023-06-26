<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../controller/php/CRUD.php';
if (
    isset($_POST['nombre']) && isset($_POST['PrecioCosto']) && isset($_POST['PrecioVenta']) &&
    isset($_POST['mensaje']) && isset($_POST['Tipo']) && isset($_POST['idDocumento'])
) {
    $id = $_POST['idDocumento'];
    $nombre = $_POST['nombre'];
    $precio_costo = $_POST['PrecioCosto'];
    $precio_venta = $_POST['PrecioVenta'];
    $descripcion = $_POST['mensaje'];
    $tipo = $_POST['Tipo'];
    $SQL = "UPDATE documentos SET  nombre ='$nombre', precio_costo = $precio_costo, 
    precio_venta = $precio_venta, descripcion = '$descripcion', tipo = '$tipo' WHERE id_articulo_documetos = $id;";

    $resultado = Actualizar($SQL);
    if ($resultado) {
        echo "<script>window.location = '../../index.php?module=articulo&Update=Actualizado'</script>";
    } else {
        echo "<script>window.location = '../../index.php?module=articulo&Update=NoActualizado'</script>";
    }
}

?>
