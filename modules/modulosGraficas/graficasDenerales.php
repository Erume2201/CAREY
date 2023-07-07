<!--Grafica Del informe General 
Carga la biblioteca de visualización de Google Charts y especifica el paquete "corechart"
-->
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    //Graficas de Clientes Generales
    var dataClientes = google.visualization.arrayToDataTable([
      ['Clientes', 'Total Compras'],
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

     //Muestra clientes que han realizado mas compras dentro del mes
    var optionsClientes = {
    title: 'Clientes que han realizado más compras dentro del mes de <?php echo $mesNombre; ?>',
    width: 1000,
    height: 600
    };

    //Actualiza la grafica
    var chartClientes = new google.visualization.PieChart(document.getElementById('graficaClientes'));

    //Muestra la grafica
    chartClientes.draw(dataClientes, optionsClientes);


    //Grafica de Documentos Generales
    var dataDocumentos = google.visualization.arrayToDataTable([
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

    var optionsDocumentos = {
    title: 'Documentos más vendidos dentro del mes de <?php echo $mesNombre; ?>',
    width: 1000,
    height: 600
    };

     var chartDocumentos = new google.visualization.PieChart(document.getElementById('graficaDocumentos'));

    chartDocumentos.draw(dataDocumentos, optionsDocumentos);

    //Grafica de Usuarios Generales

    var dataUsuarios = google.visualization.arrayToDataTable([
      ['Usuarios', 'Total vendidos'],
      <?php

      #$fechaInicio = "2023-07-01"; // Inicializar las variables con una fecha estatica
      #$fechaFin = '2023-07-02';
      $SQL = "SELECT u.nombre_completo, COUNT(v.usuarios_id) AS cantidad_usuarios
              FROM ventas v
              JOIN usuarios u ON v.usuarios_id = u.id_usuarios
              WHERE v.fecha BETWEEN '$fechaInicio' AND '$fechaFin'
              GROUP BY v.usuarios_id";
      $resultado = Consulta($SQL);
      foreach ($resultado as $fila) {
              echo "['".$fila['nombre_completo']."',".$fila['cantidad_usuarios']."],";
          }
      ?>
      ]);

    var optionsUsuarios = {
    title: 'Usuarios con más ventas registradas dentro del mes de <?php echo $mesNombre; ?>',
    width: 1000,
    height: 600
    };

    var chartUsuarios = new google.visualization.PieChart(document.getElementById('graficaUsuarios'));

    chartUsuarios.draw(dataUsuarios, optionsUsuarios);
  }
</script>