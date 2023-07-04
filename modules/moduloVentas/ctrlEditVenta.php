<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../controller/php/CRUD.php';

//Verificacion de los campos vacios
if (empty($_POST["cantidad"])) {
    echo "<script>window.location = '../../index.php?module=ventasDiarias&Update=NoActualizado'</script>";
} else {
    // Variables que guardan los datos del usuario
    $cantidad = $_POST["cantidad"];     
    $id = $_POST['datoEditVenta'];
    $precio = $_POST['precioVenta'];
    $id_ventas =$_POST['id_ventas'];
    // Hacemos la consulta para actualizar los datos en nuestra BD.
    $SQL = "UPDATE informacion_venta SET cantidad ='$cantidad', sub_total = '$cantidad' * $precio WHERE id_informacion_venta = $id";
    $SQL2 = "UPDATE informacion_venta AS iv JOIN ventas AS v ON iv.ventas_id = v.id_ventas SET          v.total_venta = (SELECT SUM(sub_total) FROM informacion_venta WHERE ventas_id = $id_ventas) WHERE id_informacion_venta = $id";
    /* El array que guardamos en nuestra variable SQL la mandamos a la función Actualizar para que nos actualice nuestra BD */
    $resultado = Actualizar($SQL);
    $resultado2 = Actualizar($SQL2);
     if ($resultado2) {
         echo "<script>window.location = '../../index.php?module=ventasDiarias&Update=Actualizado'</script>";
     } else {
         echo "<script>window.location = '../../index.php?module=ventasDiarias&Update=NoActualizado'</script>";
     }
}

?>
