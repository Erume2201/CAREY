<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Obtención de las fechas de corte "DESDE" y "HASTA"
	$fecha_inicio = $_POST['fecha_inicio'];
	$fecha_fin = $_POST['fecha_fin'];

function fechas($fecha_inicio, $fecha_fin) {
	// Validación de las fechas
		if ($fecha_inicio > $fecha_fin) {
			return false;
		} 
		else {
			// Guardo las fechas de corte
			$desde = $fecha_inicio;
			$hasta = $fecha_fin;
			return array('fecha_inicio' => $fecha_inicio, 'fecha_fin' => $fecha_fin);
		}
}
}
?>