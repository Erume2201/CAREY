<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../controller/php/CRUD.php';

//Verificacion de los campos vacios
if (empty($_POST["nombre"]) || empty($_POST["numero"]) || empty($_POST["negocio"]) || 
            empty($_POST["municipio"]) || empty($_POST["estado"]) || empty($_POST["pais"])) {
    echo "<script>window.location = '../../index.php?module=clientes&Update=NoActualizado'</script>";
} else {

    // Variables que guardan los datos del usuario
    $nombre = $_POST["nombre"];
    $numero = $_POST["numero"];
    $negocio = $_POST["negocio"];
    $municipio = $_POST["municipio"];
    $estado = $_POST["estado"];
    $pais = $_POST["pais"];     
    $id = $_POST['datoEdit'];

    // Hacemos la consulta para actualizar los datos en nuestra BD.
    $SQL = "UPDATE cliente SET  nombre_cliente ='$nombre', telefono_cliente = '$numero', nombre_negocio = '$negocio', municipio = '$municipio', estado = '$estado' WHERE id_cliente = $id;";
    
    /* El array que guardamos en nuestra variable SQL la mandamos a la función Actualizar para que nos actualice nuestra BD */
    $resultado = Actualizar($SQL);
     if ($resultado) {
         echo "<script>window.location = '../../index.php?module=clientes&Update=Actualizado'</script>";
     } else {
         echo "<script>window.location = '../../index.php?module=clientes&Update=NoActualizado'</script>";
     }
}
?>
