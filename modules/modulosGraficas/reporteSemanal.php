<body>
  <div class="container col-9">
    <?php
    date_default_timezone_set('America/Mexico_City');
    $dia = date('l Y-m-d');
    $mes = date('F');
    $fechaBd = date('Y-m-d');
    ?>
    <h2 class="text-center"><?php echo ("Mes: ".$mes); ?></h2>
    <hr>
    <h4 class="text-center"><?php echo ("Fecha del día de hoy: ".$dia); ?></h4>
    <hr>

    <?php
        //obtener el mes y año en que nos encontramos
        date_default_timezone_set('America/Mexico_City');
        $Years = date('Y');
        $mes = date('n');

        function obtenerFechasSemanasEnMes($Years, $mes) {
            $fechasSemanas = array();
            $numeroSemana = 1;
            $fecha = new DateTime();
            $fecha->setDate($Years, $mes, 1);
            $primerDiaMes = $fecha->format('N'); // Obtener el número del primer día del mes (1: lunes, 7: domingo)

            // Obtener la fecha del primer día de la primera semana
            $fechaInicio = $fecha->format('Y-m-d');
            $fechaFin = $fecha->modify('next Sunday')->format('Y-m-d');
            $fechasSemanas[$numeroSemana] = [$fechaInicio, $fechaFin];
            $numeroSemana++;

            // Avanzar al próximo lunes después del primer día del mes
            $fecha->modify('next Monday');

            // Obtener las fechas de las semanas restantes
            while ($fecha->format('n') == $mes) {
                $fechaInicio = $fecha->format('Y-m-d');
                $fechaFin = $fecha->modify('next Sunday')->format('Y-m-d');
                $fechasSemanas[$numeroSemana] = [$fechaInicio, $fechaFin];
                $numeroSemana++;
                $fecha->modify('next Monday');
            }

            return $fechasSemanas;
        }

        $fechasSemanas = obtenerFechasSemanasEnMes($Years, $mes);

        foreach ($fechasSemanas as $numeroSemana => $fechas) {
            $fechaInicio = $fechas[0];
            $fechaFin = $fechas[1];
            echo "<p style='display: none;'>Semana $numeroSemana: $fechaInicio - $fechaFin</p>";
        }
        ?>

         <ul class="nav nav-pills nav-fill">
            <?php foreach ($fechasSemanas as $numeroSemana => $fechas) { ?>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#semana<?php echo $numeroSemana; ?>" onclick="mostrarContenido('semana<?php echo $numeroSemana; ?>')">Semana <?php echo $numeroSemana; ?></a>
                </li>
            <?php } ?>
        </ul>

        <?php foreach ($fechasSemanas as $numeroSemana => $fechas) { ?>
            <div id="semana<?php echo $numeroSemana; ?>" class="contenido-semana text-center" style="display: none;">
                <?php
                $fechaInicio = $fechas[0];
                $fechaFin = $fechas[1];
                echo "<h3>Fecha de la semana: $fechaInicio hasta $fechaFin </h3>";
                ?>
                <div id="piechart<?php echo $numeroSemana; ?>_1" style="width: 1000px; height: 900px;"></div>
                <div id="piechart<?php echo $numeroSemana; ?>_2" style="width: 1000px; height: 900px;"></div>
            </div>
        <?php } ?>
    </div>

    <script>
        function mostrarContenido(semana) {
            var contenidoSemanas = document.getElementsByClassName("contenido-semana");
            for (var i = 0; i < contenidoSemanas.length; i++) {
                contenidoSemanas[i].style.display = "none";
            }
            document.getElementById(semana).style.display = "block";
        }

        // Mostrar contenido de la semana 1 al cargar la página
        window.onload = function() {
            mostrarContenido('semana1');
        };
    </script>

    <script>
        google.charts.load('current', {'packages':['corechart']});
        <?php foreach ($fechasSemanas as $numeroSemana => $fechas) { ?>
        google.charts.setOnLoadCallback(drawChart<?php echo $numeroSemana; ?>);

        function drawChart<?php echo $numeroSemana; ?>() {
            var data<?php echo $numeroSemana; ?>_1 = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Work', 11],
                ['Eat', 2],
                ['Commute', 2],
                ['Watch TV', 2],
                ['Sleep', 7]
            ]);

            var options<?php echo $numeroSemana; ?>_1 = {
                title: 'Documentos más vendidos en la semana <?php echo $numeroSemana; ?>',
                width: 1000,
                height: 800
            };

            var chart<?php echo $numeroSemana; ?>_1 = new google.visualization.PieChart(document.getElementById('piechart<?php echo $numeroSemana; ?>_1'));
            chart<?php echo $numeroSemana; ?>_1.draw(data<?php echo $numeroSemana; ?>_1, options<?php echo $numeroSemana; ?>_1);

            var data<?php echo $numeroSemana; ?>_2 = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Work', 8],
                ['Eat', 3],
                ['Commute', 2],
                ['Watch TV', 4],
                ['Sleep', 7]
            ]);

            var options<?php echo $numeroSemana; ?>_2 = {
                title: ' Clientes que han realizado más compras dentro de la semana <?php echo $numeroSemana; ?>',
                width: 1000,
                height: 800
            };

            var chart<?php echo $numeroSemana; ?>_2 = new google.visualization.PieChart(document.getElementById('piechart<?php echo $numeroSemana; ?>_2'));
            chart<?php echo $numeroSemana; ?>_2.draw(data<?php echo $numeroSemana; ?>_2, options<?php echo $numeroSemana; ?>_2);
        }
        <?php } ?>
    </script>
