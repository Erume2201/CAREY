<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../CRUD.php';
 $nombreCliente = $_POST["nombreCliente"];
 $numeroTelefono= $_POST["numeroTelefono"];
 $empresa = $_POST["empresa"];
 $idCliente = $_POST["idCliente"];
 $totalPago = $_POST["totalPago"];
 $fechaInicioConsulta = $_POST["fechaInicioConsulta"];
 $fechaFinConsulta = $_POST['fechaFinConsulta'];


//Verificacion de los campos vacios
if (empty($_POST["nombreCliente"]) || empty($_POST["numeroTelefono"]) || empty($_POST["empresa"]) 
|| empty($_POST["idCliente"])|| empty($_POST["totalPago"]) || empty($_POST["fechaInicioConsulta"])
||  empty($_POST["fechaFinConsulta"])) {

    echo "<script>window.location = '../../../index.php?module=historialCreditos&Update=NoPagado'</script>";

}else{
    //Variables que guardan los datos del usuario
     $nombreCliente = $_POST["nombreCliente"];
     $numeroTelefono= $_POST["numeroTelefono"];
     $empresa = $_POST["empresa"];
     $idCliente = $_POST["idCliente"];
     $totalPago = $_POST["totalPago"];
     $fechaInicioConsulta = $_POST['fecha_ini'];
     $fechaFinConsulta = $_POST['fecha_fin'];

     $SQL = "UPDATE creditos cre SET cre.estatus = 'pagado' 
     WHERE cre.cliente_id = $idCliente AND cre.fecha NOT BETWEEN '$fechaInicioConsulta' AND '$fechaFinConsulta' 
     AND cre.estatus='pendiente';";

     $resultado = Actualizar($SQL);
     if ($resultado) {
        echo "<script>window.location = '../../../index.php?module=historialCreditos&Update=Pagado'</script>";
     } else {
        echo "<script>window.location = '../../../index.php?module=historialCreditos&Update=NoPagado1'</script>";
     }
}

?>