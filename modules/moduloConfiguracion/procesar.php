
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
    $fecha_fin = date('Y-m-d', strtotime('last ' . $hastaDia, strtotime($fechaActual)));

    echo "Fecha DESDE: " . $fecha_inicio . "<br>";
    echo "Fecha HASTA: " . $fecha_fin . "<br>";

    // Validación de las fechas
    if ($fecha_inicio > $fecha_fin) {
        echo '<div class="alert alert-danger" role="alert">
                La fecha inicio (DESDE) no puede ser posterior a la fecha fin (HASTA).
              </div>';
    } else {
        // Resto del código para guardar las fechas de corte
        $desde = $fecha_inicio;
        $hasta = $fecha_fin;
        echo '<div class="alert alert-success" role="alert">Las fechas de corte se guardaron correctamente.</div>';
    }
}
?>


