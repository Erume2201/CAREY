<body>
  <div class="">
    <?php
    //Traductor
   $meses = array(
        1 => 'Enero',
        2 => 'Febrero',
        3 => 'Marzo',
        4 => 'Abril',
        5 => 'Mayo',
        6 => 'Junio',
        7 => 'Julio',
        8 => 'Agosto',
        9 => 'Septiembre',
        10 => 'Octubre',
        11 => 'Noviembre',
        12 => 'Diciembre'
    );
   $dias = array(
    01 => 'Lunes',
    02 => 'Martes',
    03 => 'Miércoles',
    04 => 'Jueves',
    05 => 'Viernes',
    06 => 'Sábado',
    07 => 'Domingo',
   );

    // Obtener la fecha actual y mostrarla en la página
    date_default_timezone_set('America/Mexico_City');
    $dia = date('Y-m-d');
    $diaNombre = $dias[date('N')];
    $mes = date('F');
    $mesNombre = $meses[date('n')];
    $fechaBd = date('Y-m-d');
    ?>
    <h2 class="text-center"><?php echo ("Mes: ".$mesNombre); ?></h2>
    <hr>
    <h4 class="text-center"><?php echo ("Fecha del día de hoy: $diaNombre ".$dia); ?></h4>
    <hr>

    <?php
        //obtener el mes y año en que nos encontramos
        date_default_timezone_set('America/Mexico_City');
        $Years = date('Y');
        $mes = date('n');
        //Funcion para divider el mes en semanas, inicio de semana Lunes y fin de la semana Domingo.
        function obtenerFechasSemanasEnMes($Years, $mes) {
            //arreglo que contendra las fechas.
            $fechasSemanas = array(); 
            //asignacion de un número de semana a cada conjunto de fechas.
            $numeroSemana = 1; 
            //se crea la instancia sin niguna Fecha.
            $fecha = new DateTime(); 
            //se establece la fecha del primer dia de mes.
            $fecha->setDate($Years, $mes, 1); 
            // obtener el número del primer día del mes (1: lunes, 7: domingo).
            $primerDiaMes = $fecha->format('N'); 

            // Obtener la fecha del primer día de la primera semana
            $fechaInicio = $fecha->format('Y-m-d');
            //obtiene la fecha formateada como 'Y-m-d'.
			$fechaFin = $fecha->modify('next Sunday')->format('Y-m-d');
            //modifica la fecha para que sea el próximo domingo y la asigna a $fechaFin. 
			$fechasSemanas[$numeroSemana] = [$fechaInicio, $fechaFin];
            //almacena las fechas de inicio y fin en el arreglo $fechasSemanas, utilizando $numeroSemana como índice.
			$numeroSemana++;
            //incrementa el valor de $numeroSemana para la siguiente semana. 

            // Avanzar al próximo lunes después del primer día del mes
            $fecha->modify('next Monday');

            // Obtener las fechas de las semanas restantes
			while ($fecha->format('n') == $mes) {
                 //obtiene la fecha actual y la asigna a $fechaInicio.
			    $fechaInicio = $fecha->format('Y-m-d');
                //modifica la fecha para que sea el próximo domingo y la asigna a $fechaFin.
			    $fechaFin = $fecha->modify('next Sunday')->format('Y-m-d');
                //almacena las fechas de inicio y fin en el arreglo $fechasSemanas, utilizando $numeroSemana como índice. 
			    $fechasSemanas[$numeroSemana] = [$fechaInicio, $fechaFin]; 
                //incrementa el valor de $numeroSemana para la siguiente semana.
			    $numeroSemana++; 
                //modifica la fecha para que sea el próximo lunes.
			    $fecha->modify('next Monday'); 
			}

            return $fechasSemanas;
        }

        //Este bloque obtiene las fechas de las semanas en el mes
        
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
            <div id="semana<?php echo $numeroSemana; ?>" class="contenido-semana" style="display: none;">
                <?php
                $fechaInicio = $fechas[0];
                $fechaFin = $fechas[1];
                #echo "<h3 class=\"text-center\>Rango: desde $fechaInicio hasta $fechaFin </h3>";
                ?>
                <h3 class="text-center">Rango: desde <?php echo $fechaInicio; ?> hasta <?php echo $fechaFin; ?></h3>

                <div class="">
                  <div class="row">
                    <div class="container col-6">
                        <div id="piechart<?php echo $numeroSemana; ?>_2" style="width: 900px; height: 500px;"></div>
                    </div>
                    <div class="container col-6">
                        <div id="piechart<?php echo $numeroSemana; ?>_1" style="width: 900px; height: 500px;"></div>
                    </div>
                  </div>
                </div>
                <?php include("modules/modulosGraficas/graficas.php"); ?>
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