  <script>
        google.charts.load('current', {'packages':['corechart']});
        <?php foreach ($fechasSemanas as $numeroSemana => $fechas) { ?>
        google.charts.setOnLoadCallback(drawChart<?php echo $numeroSemana; ?>);
        <?php
        $fechaInicio = $fechas[0];
        $fechaFin = $fechas[1];
        ?>
        function drawChart<?php echo $numeroSemana; ?>() {
            var data<?php echo $numeroSemana; ?>_1 = google.visualization.arrayToDataTable([
                ['Usuarios', 'Ventas Realizadas'],
                <?php
                    #$fechaInicio = "2023-07-01"; // Inicializar las variables con una fecha estatica
                    #$fechaFin = '2023-07-02';
                    $SQL = "SELECT c.nombre_cliente, COUNT(cr.id_creditos) AS cantidad_creditos 
                            FROM creditos cr
                            JOIN cliente c ON cr.cliente_id = c.id_cliente
                            WHERE cr.fecha BETWEEN '$fechaInicio' AND '$fechaFin'
                            GROUP BY cr.cliente_id";
                    $resultado = Consulta($SQL);
                    foreach ($resultado as $fila) {
                        echo "['".$fila['nombre_cliente']."',".$fila['cantidad_creditos']."],";
                    }
                ?>
            ]);

            var options<?php echo $numeroSemana; ?>_1 = {
                title: 'Clientes que han realizado más compras dentro de la semana <?php echo $numeroSemana; ?>',
                width: 1000,
                height: 600
            };

            var chart<?php echo $numeroSemana; ?>_1 = new google.visualization.PieChart(document.getElementById('piechart<?php echo $numeroSemana; ?>_1'));
            chart<?php echo $numeroSemana; ?>_1.draw(data<?php echo $numeroSemana; ?>_1, options<?php echo $numeroSemana; ?>_1);

            var data<?php echo $numeroSemana; ?>_2 = google.visualization.arrayToDataTable([
                ['Documentos', 'Total vendidos'],
                <?php
                    #$fechaInicio = "2023-07-01"; // Inicializar las variables con una fecha estática
                    #$fechaFin = '2023-07-02';
                    $SQL = "SELECT d.nombre, SUM(iv.cantidad) AS total_cantidad
                        FROM informacion_venta iv
                        JOIN ventas v ON iv.ventas_id = v.id_ventas
                        JOIN documentos d ON iv.documentos_id = d.id_articulo_documetos
                        WHERE v.fecha BETWEEN '$fechaInicio' AND '$fechaFin'
                        GROUP BY d.nombre";
                    $resultado = Consulta($SQL);
                    foreach ($resultado as $fila) {
                        echo "['".$fila['nombre']."',".$fila['total_cantidad']."],";
                    }
                ?>
            ]);

            var options<?php echo $numeroSemana; ?>_2 = {
                title: ' Documentos más vendidos en la semana <?php echo $numeroSemana; ?>',
                width: 1000,
                height: 600
            };

            var chart<?php echo $numeroSemana; ?>_2 = new google.visualization.PieChart(document.getElementById('piechart<?php echo $numeroSemana; ?>_2'));
            chart<?php echo $numeroSemana; ?>_2.draw(data<?php echo $numeroSemana; ?>_2, options<?php echo $numeroSemana; ?>_2);
        }
        <?php } ?>
    </script>
