
<!--Este módulo controlará los botones de ver, editar y eliminar-->

<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../controller/php/CRUD.php';

$dato = $_POST['datoDelete'];
$SQLSaldo = "SELECT * FROM creditos WHERE cliente_id = '$dato'";
$querySaldo = Consulta($SQLSaldo);
if (empty($querySaldo)) {
	$SQL = "DELETE FROM cliente WHERE id_cliente = '$dato'";
	$resultado = EliminarDato($SQL);
	if ($resultado) {
		echo "<script>window.location = '../../index.php?module=clientes&Delete=Borrado'</script>";		
	} else{
		echo "<script>window.location = '../../index.php?module=clientes&Delete=NoBorrado'</script>";
	}
} elseif (count($querySaldo) > 0) {
	foreach ($querySaldo AS $fila) {
		if ($fila['total'] != 0) {
			echo "<script>window.location = '../../index.php?module=clientes&Delete=NoBorrado'</script>";
		} else {
			$SQL3 = "DELETE FROM ventas WHERE credito_id IN (SELECT id_creditos FROM creditos WHERE cliente_id = '$dato')";
			$resultado3 = EliminarDato($SQL3);
			$SQL2 = "DELETE FROM creditos WHERE cliente_id = '$dato'";
			$resultado2 = EliminarDato($SQL2);
			$SQL = "DELETE FROM cliente WHERE id_cliente = '$dato'";
			$resultado = EliminarDato($SQL);
			if ($resultado) {
				echo "<script>window.location = '../../index.php?module=clientes&Delete=Borrado'</script>";		
			} else{
				echo "<script>window.location = '../../index.php?module=clientes&Delete=NoBorrado'</script>";
			}
		}
	}
}	
?>