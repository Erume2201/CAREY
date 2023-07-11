<!--Grafica Del informe General 
Carga la biblioteca de visualización de Google Charts y especifica el paquete "corechart"
-->
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() { 

    /**Graficas de Clientes Generales
    var dataClientes = google.visualization.arrayToDataTable([
      ['Clientes', 'Total Compras'],
      <?php

      #$fechaInicio = "2023-07-01"; // Inicializar las variables con una fecha estatica
      #$fechaFin = '2023-07-02';
      $SQL = "SELECT c.nombre_cliente, COUNT(cr.id_creditos) AS cantidad_creditos 
              FROM creditos cr
              JOIN cliente c ON cr.cliente_id = c.id_cliente
              WHERE cr.fecha BETWEEN '$fechaInicioM' AND '$fechaFinM'
              GROUP BY cr.cliente_id";
      $resultado = Consulta($SQL);
      foreach ($resultado as $fila) {
              echo "['".$fila['nombre_cliente']."',".$fila['cantidad_creditos']."],";
          }
      ?>
      ]);

     //Muestra clientes que han realizado mas compras dentro del mes
    var optionsClientes = {
    title: 'Clientes que han realizado más compras dentro del mes de <?php echo $mesNombre; ?>',
    width: 1000,
    height: 600
    };

    //Actualiza la grafica
    var chartClientes = new google.visualization.PieChart(document.getElementById('graficaClientes'));

    //Muestra la grafica
    chartClientes.draw(dataClientes, optionsClientes); **/


    //Grafica de Documentos Generales
    var dataDocumentos = google.visualization.arrayToDataTable([
      ['Documentos', 'Total vendidos'],
      <?php
          foreach ($iniciosDeSemana as $numeroSemana => $fechaInicio) {
            $fechaFin = $finesDeSemana[$numeroSemana];
            $SQL = "SELECT d.nombre, SUM(iv.cantidad) AS total_cantidad
                    FROM informacion_venta iv
                    JOIN ventas v ON iv.ventas_id = v.id_ventas
                    JOIN documentos d ON iv.documentos_id = d.id_articulo_documetos
                    WHERE v.fecha BETWEEN '$fechaInicio' AND '$fechaFin'
                    GROUP BY d.nombre";
            $resultado = Consulta($SQL);

            $maxCantidadVentas = 0;
            $nombreDocumento = '';

            foreach ($resultado as $fila) {
                $cantidadVentas = $fila['total_cantidad'];
                if ($cantidadVentas > $maxCantidadVentas) {
                    $maxCantidadVentas = $cantidadVentas;
                    $nombreDocumento = $fila['nombre'];
                }
            }
            echo "['Semana $numeroSemana: $nombreDocumento',".$maxCantidadVentas."],";
            #importanteecho "Semana $numeroSemana: $nombreDocumento <br> Con $maxCantidadVentas<br>";
        }

      ?>
    ]);

    var optionsDocumentos = {
    title: 'Cantidad de documentos más vendidos por semana dentro del mes de <?php echo $mesNombre; ?>',
    width: 1000,
    height: 600
    };

     var chartDocumentos = new google.visualization.PieChart(document.getElementById('graficaDocumentos'));

    chartDocumentos.draw(dataDocumentos, optionsDocumentos);

    //Grafica de Usuarios Generales

    var dataUsuarios = google.visualization.arrayToDataTable([
      ['Semanas', 'Total vendidos'],
      <?php

      foreach ($iniciosDeSemana as $numeroSemana => $fechaInicio) {
        $fechaFin = $finesDeSemana[$numeroSemana];
        $SQL = "SELECT COUNT(id_ventas) AS cantidad_ventas
                FROM ventas
                WHERE fecha BETWEEN '$fechaInicio' AND '$fechaFin'";
      $resultado = Consulta($SQL);
      foreach ($resultado as $fila) {
        $cantidadVentas = $fila['cantidad_ventas'];
      }
        echo "['Semana ".$numeroSemana."',".$cantidadVentas."],";
        #importante echo "Semana $numeroSemana: $cantidadVentas<br>";
      }
      ?>
      ]);

    var optionsUsuarios = {
    title: 'Cantidad de ventas por semanas registradas dentro del mes de <?php echo $mesNombre; ?>',
    width: 1000,
    height: 600
    };

    var chartUsuarios = new google.visualization.PieChart(document.getElementById('graficaUsuarios'));

    chartUsuarios.draw(dataUsuarios, optionsUsuarios);
  }
</script>