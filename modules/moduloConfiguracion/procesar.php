
<!--Este es el controlador para agregar un nuevo cliente a la BD-->

<?php
    // Nuestro IF principal verifica si se ha enviado el formulario y se ha hecho clic en "enviar".
    if (isset($_POST['enviar'])) {
        // Colocaremos otro if para que en caso de que algún campo está vacío se envíe una alerta.
        if (empty($_POST["desde"]) || empty($_POST["hasta"])) {
            ?>
                <div class="alert alert-danger" role="alert">Oops, algunos campos no fueron seleccionados.</div>
            <?php
        } else {
            /* Asignamos los valores de los campos del formulario (accediendo a través del arreglo '$_POST') a variables específicas. */
            $desdeDia = $_POST["desde"];
            $hastaDia = $_POST["hasta"];

            // Cambiamos la zona por default y obtemos el día de la fecha actual
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

            // Verificamos que la diferencia entre DESDE y HASTA sea de 7 dias calendarios
            if ($diferencia_dias != 6) {
                echo '<div class="alert alert-danger" role="alert">La diferencia de dias entre las fechas DESDE (' . $fecha_inicio . ') y HASTA (' . $fecha_fin . ') deben ser de 7 dias calendario.</div>';
            } else {
                // Almacenamos las fechas en las variables $desde y $hasta
                $desde = $fecha_inicio;
                $hasta = $fecha_fin;
                // Ahora insertaremos los datos en la BD.
                $SQL = "INSERT INTO corte (desde, hasta, usuarios_id) VALUES ('$desde', '$hasta', 1)";
                $resultado = InsertarDato($SQL);
                if ($resultado) {
                    echo '<div class="alert alert-success" role="alert">Las fechas de corte DESDE (' . $fecha_inicio . ') y HASTA (' . $fecha_fin . ') se guardaron correctamente.</div>';
                } else {
                    ?>
                        <div class="alert alert-danger" role="alert">Algo salió mal, por favor intentelo de nuevo.</div>
                    <?php

                }
            }
        }
    }
?>