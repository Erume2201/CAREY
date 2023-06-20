<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	// Obtención de las fechas de corte "DESDE" y "HASTA"
	$fecha_inicio = $_POST['fecha_inicio'];
	$fecha_fin = $_POST['fecha_fin'];

	// Validación de las fechas
	if ($fecha_inicio > $fecha_fin) {
		echo "La fecha inicio (DESDE) no puede ser posterior a la fecha fin (HASTA).";
		exit;
	}

	// Guardo las fechas de corte
	$desde = $fecha_inicio;
	$hasta = $fecha_fin;

	echo "Las fechas de corte se guardaron correctamente.";
}
	?>
