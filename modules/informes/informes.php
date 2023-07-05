<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../controller/php/CRUD.php';

$precioFinal = $_POST['precioFinal'];
$ganancia = $_POST['gananciaSemanal'];
$fechaInicio=$_POST['FechaInicio'];
$fechafin=$_POST['FechaFin'];
$sqlinforme ="INSERT INTO informes (precio_final, ganancia_semanal, fecha_inicio, fecha_final) 
         VALUES ($precioFinal, $ganancia, '$fechaInicio', '$fechafin');";
$resultadoInforme= insertarDatosDoble($sqlinforme);

if (empty($resultadoInforme)) {
    echo "<script>window.location = '../../index.php?module=ventaSemanal&Informe=NoRealizado'</script>";
 }else{
     $idinformeDocumento = $_POST['idInformeDocumento'];
     $DocumentoCantidad= $_POST['cantidadDocumento'];
     $DocumentoTotal= $_POST['TotalDocumento'];
     for ($i = 0; $i < count($idinformeDocumento); $i++) {
          $id =  $idinformeDocumento[$i];
          $cantidaD = $DocumentoCantidad[$i];
          $finalTotalDocumento = $DocumentoTotal[$i];

          $SQLinformeDetalle = "INSERT INTO informes_detalles (cantidad, total, informe_id, documentos_id) 
                                             VALUES ($cantidaD, $finalTotalDocumento, $resultadoInforme, $id);";

          $DetalleFIn = InsertarDato($SQLinformeDetalle);                  
       }
   
   echo "<script>window.location = '../../index.php?module=ventaSemanal&Informe=Realizado'</script>";
 }


?>