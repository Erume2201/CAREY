<?php
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
            VALUES ('Inicial', '$Fecha', 0, '$cliente');";
            $resultado = insertarDatosDoble($SQLCredito);

    }
    if (empty($resultado)) {
        
    }else{
        $idusuario = 1;
        $hora = $_POST['horaValor'];
        $SQLventaPadre = "INSERT INTO ventas (total_venta, hora, fecha, credito_id, usuarios_id) 
                        VALUES ($total, '$hora', '$hora', '$resultado', '$idusuario');";
        $FinalVenta = insertarDatosDoble($SQLventaPadre);
    }
    if (empty($FinalVenta)) {
        
    }else{
        
    }
} else {
    // Código adicional si es necesario para el tipo de venta diferente de 'Decontado'
}


?>
