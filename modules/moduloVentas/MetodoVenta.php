<?php
session_start();
// Obtener los valores enviados por el formulario
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../controller/php/CRUD.php';
$tipoVenta = $_POST['TipoVenta'];
 
if ($tipoVenta == 'Decontado') {
    if (isset($_POST['DiaVentaValor']) && isset($_POST['TotalFinal']) && isset($_POST['IDcliente'])) {
        $cliente = $_POST['IDcliente'];
        $total = $_POST['TotalFinal'];
        $Fecha = $_POST['DiaVentaValor'];

            $SQLCredito = "INSERT INTO creditos (estatus, fecha, total, cliente_id) 
            VALUES ('pagado', '$Fecha', 0, '$cliente');";
            $resultado = insertarDatosDoble($SQLCredito);

    }
    if (empty($resultado)) {
        echo "<script>window.location = '../../index.php?module=venderDocumento&cliente=Nocliente&venta=NoRealizada'</script>";
    }else{
        $idusuario = $_SESSION['id_user'];
        $hora = $_POST['horaValor'];
        $SQLventaPadre = "INSERT INTO ventas (total_venta, hora, fecha, credito_id, usuarios_id) 
                        VALUES ($total, '$hora', '$hora', '$resultado', '$idusuario');";
        $FinalVenta = insertarDatosDoble($SQLventaPadre);
    }
    if (empty($FinalVenta)) {
       echo "<script>window.location = '../../index.php?module=venderDocumento&cliente=Nocliente&venta=NoRealizada'</script>";
    }else{
        $idDocument = $_POST['ValorIdDocumen'];
        $CantidadDocumento= $_POST['ValorCantidad'];
        $SubtotalDocumento= $_POST['subTotal'];
        for ($i = 0; $i < count($idDocument); $i++) {
             $id = $idDocument[$i];
             $cantidaD = $CantidadDocumento[$i];
             $subT = $SubtotalDocumento[$i];

             $SQLinformacion = "INSERT INTO informacion_venta (cantidad , sub_total, documentos_id, ventas_id) 
                                VALUES ($cantidaD,$subT,$id, $FinalVenta);";
              $DetalleFIn = InsertarDato($SQLinformacion);                  
          }
      
        echo "<script>window.location = '../../index.php?module=venderDocumento&cliente=Nocliente&venta=Realizada'</script>";
    }
} else {
    // Código adicional si es necesario para el tipo de venta diferente de 'Decontado'
    if (isset($_POST['DiaVentaValor']) && isset($_POST['TotalFinal']) && isset($_POST['IDcliente'])) {
        $cliente = $_POST['IDcliente'];
        $total = $_POST['TotalFinal'];
        $Fecha = $_POST['DiaVentaValor'];

            $SQLCredito = "INSERT INTO creditos (estatus, fecha, total, cliente_id) 
            VALUES ('pendiente', '$Fecha', $total, '$cliente');";
            $resultado = insertarDatosDoble($SQLCredito);

    }
    if (empty($resultado)) {
        echo "<script>window.location = '../../index.php?module=venderDocumento&cliente=Nocliente&venta=NoRealizada'</script>";
    }else{
        $idusuario = $_SESSION['id_user'];
        $hora = $_POST['horaValor'];
        $SQLventaPadre = "INSERT INTO ventas (total_venta, hora, fecha, credito_id, usuarios_id) 
                        VALUES ($total, '$hora', '$hora', '$resultado', '$idusuario');";
        $FinalVenta = insertarDatosDoble($SQLventaPadre);
    }
    if (empty($FinalVenta)) {
       echo "<script>window.location = '../../index.php?module=venderDocumento&cliente=Nocliente&venta=NoRealizada'</script>";
    }else{
        $idDocument = $_POST['ValorIdDocumen'];
        $CantidadDocumento= $_POST['ValorCantidad'];
        $SubtotalDocumento= $_POST['subTotal'];
        for ($i = 0; $i < count($idDocument); $i++) {
             $id = $idDocument[$i];
             $cantidaD = $CantidadDocumento[$i];
             $subT = $SubtotalDocumento[$i];

             $SQLinformacion = "INSERT INTO informacion_venta (cantidad , sub_total, documentos_id, ventas_id) 
                                VALUES ($cantidaD,$subT,$id, $FinalVenta);";
              $DetalleFIn = InsertarDato($SQLinformacion);                  
          }
      
        echo "<script>window.location = '../../index.php?module=venderDocumento&cliente=Nocliente&venta=Realizada'</script>";
    }
}

?>
