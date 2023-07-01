<?php
function obtenerFechasCorte($desdeDia, $hastaDia) {
    // Obtención de la fecha actual
    date_default_timezone_set('America/Mexico_City');
    $fechaActual = date('Y-m-d');
    $timestamp = strtotime($fechaActual);
    $diaActual = date('l', $timestamp);

    // Cálculo de las fechas de inicio y fin en función de los días seleccionados
    if ($desdeDia == $diaActual) {
        $fecha_inicio = $fechaActual; 
    } else {
        $fecha_inicio = date('Y-m-d', strtotime("last $desdeDia", strtotime($fechaActual)));
    }
    $fecha_fin = date('Y-m-d', strtotime("next $hastaDia", strtotime($fechaActual)));

    // Obtención de los timestamps de las fechas DESDE y HASTA
    $timestamp_desde = strtotime($fecha_inicio);
    $timestamp_hasta = strtotime($fecha_fin);

    // Calculamos la diferencia en días
    $diferencia_dias = ($timestamp_hasta - $timestamp_desde) / (60 * 60 * 24);

    // Verificamos que la diferencia entre DESDE y HASTA sea de 7 días calendario
    if ($diferencia_dias != 6) {
        return false;
    } else {
        // Almacenamos las fechas en las variables $desde y $hasta
        $desde = $fecha_inicio;
        $hasta = $fecha_fin;
        return array('desde' => $desde, 'hasta' => $hasta);
    }
}

// Ejemplo de uso:
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $desdeDia = $_POST['desde'];
    $hastaDia = $_POST['hasta'];

    $fechasCorte = obtenerFechasCorte($desdeDia, $hastaDia);

    if ($fechasCorte) {
        $desde = $fechasCorte['desde'];
        $hasta = $fechasCorte['hasta'];
        echo '<div class="alert alert-success" role="alert">Las fechas de corte DESDE (' . $desde . ') y HASTA (' . $hasta . ') se guardaron correctamente.</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">La diferencia de días entre las fechas DESDE y HASTA debe ser de 7 días calendario.</div>';
    }
}
?>
