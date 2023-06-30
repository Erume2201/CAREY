
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtención de los días de la semana seleccionados
    $desdeDia = $_POST['desde'];
    $hastaDia = $_POST['hasta'];

    // Obtención de la fecha actual
    $fechaActual = date('Y-m-d');

    echo "Fecha actual: " . $fechaActual . "<br>";
    echo "Fecha DESDE: " . $desdeDia . "<br>";
    echo "Fecha HASTA: " . $hastaDia . "<br>";

    // Cálculo de las fechas de inicio y fin en función de los días seleccionados
    $fecha_inicio = date('Y-m-d', strtotime("last $desdeDia", strtotime($fechaActual)));
    $fecha_fin = date('Y-m-d', strtotime("next $hastaDia", strtotime($fechaActual)));

    echo "Fecha DESDE: " . $fecha_inicio . "<br>";
    echo "Fecha HASTA: " . $fecha_fin . "<br>";

    // Obtención de los timestamps de las fechas DESDE y HASTA
    $timestamp_desde = strtotime($fecha_inicio);
    $timestamp_hasta = strtotime($fecha_fin);

    // Calculamos la diferencia en días
    $diferencia_dias = ($timestamp_hasta - $timestamp_desde) / (60 * 60 * 24);

    // Verificamos que la diferencia entre DESDE y HASTA sea de 7 dias calendarios
    if ($diferencia_dias != 6) {
        echo '<div class="alert alert-danger" role="alert">
                La diferencia de días entre DESDE y HASTA debe ser de 7 días calendario.
              </div>';
    } else {
        // Almacenamos las fechas en las variables $desde y $hasta
        $desde = $fecha_inicio;
        $hasta = $fecha_fin;
        echo '<div class="alert alert-success" role="alert">Las fechas de corte se guardaron correctamente.</div>';
    }
}
?>


