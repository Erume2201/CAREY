<?php
// Obtener los valores enviados por el formulario
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../controller/php/CRUD.php'; 
$tipoVenta = $_POST['TipoVenta'];

if ($tipoVenta=='Decontado') {
    if (isset($_POST['DiaVentaValor'])&& isset($_POST['TotalFinal'])&&isset($_POST['IDcliente'])) {
        $cliente =$_POST['IDcliente'];
        $total =$_POST['TotalFinal'];
        $Fecha =$_POST['DiaVentaValor'];
        $SQLCredito = "INSERT INTO creditos (estatus, fecha, total, cliente_id) 
        VALUES ('Inicial', '$Fecha', $total, '$cliente');";
        $resultado = insertarDatosDoble($SQLCredito);

        echo $resultado;
    }
    
   }else{


   }


?>