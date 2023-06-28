<?php 
	// Obtener los valores enviados por el formulario
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	require '../../controller/php/CRUD.php'; 

	$dato = $_POST['dato'];
	//echo $dato;
	$SQL = "DELETE FROM usuarios WHERE id_usuarios = '$dato'";
	$resultado = EliminarDato($SQL);

	if ($resultado) {
		echo "<script>window.location = '../../index.php?module=usuario&Delete=Borrado'</script>";		
	} else{
		echo "<script>window.location = '../../index.php?module=usuario&Delete=NoBorrado'</script>";
	}

?>
