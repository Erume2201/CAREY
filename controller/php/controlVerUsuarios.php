<?php 
	// Obtener los valores enviados por el formulario
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	require '../../controller/php/CRUD.php'; 
	//Eliminar un usuario de la bd
	$dato = $_POST['dato'];
	//echo $dato;
	$SQLVenta = "SELECT id_ventas FROM ventas WHERE usuarios_id = '$dato'";
	$consultaVentas = Consulta($SQLVenta);
	if (empty($consultaVentas)) {

		$SQLU = "DELETE FROM usuarios WHERE id_usuarios = '$dato'";
		$resultadoU = EliminarDato($SQLU);

		if ($resultadoU) {
			echo "<script>window.location = '../../index.php?module=usuario&Delete=Borrado'</script>";		
		} else{
			echo "<script>window.location = '../../index.php?module=usuario&Delete=NoBorrado'</script>";
		}
	} elseif (count($consultaVentas) > 0) {

		// Borrar los registros de informacion_venta asociados a los id_ventas obtenidos
		foreach ($consultaVentas as $venta) {
			$idVenta = $venta['id_ventas'];
			$SQLInformacionVentas = "DELETE FROM informacion_venta WHERE ventas_id = '$idVenta'";
			EliminarDato($SQLInformacionVentas);
		}

		$SQL3 = "DELETE FROM ventas WHERE usuarios_id = '$dato'";
		$resultado3 = EliminarDato($SQL3);
		$SQL2 = "DELETE FROM corte WHERE usuarios_id = '$dato'";
		$resultado2 = EliminarDato($SQL2);
		$SQL = "DELETE FROM usuarios WHERE id_usuarios = '$dato'";
		$resultado = EliminarDato($SQL);
		if ($resultado) {
			echo "<script>window.location = '../../index.php?module=usuario&Delete=Borrado'</script>";
		} else{
			echo "<script>window.location = '../../index.php?module=usuario&Delete=NoBorrado'</script>";
		}

	}

?>
