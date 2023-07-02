<?php 
  date_default_timezone_set('America/Mexico_City');
  $fechaActual = date('Y-m-d');

  if(isset($_POST['fecha'])) {
    $fechaSeleccionada = $_POST['fecha'];

    // Convierte la fecha seleccionada a un formato compatible con DATETIME
    $fechaSeleccionada = date('Y-m-d', strtotime($fechaSeleccionada));
  }
?>

<!-- Este módulo mostrará las ventas que se hayan hecho a lo largo del día-->
<div class="contenido-do row">
  <br><br>
  <div class="container col-8 text-center">
    <br>
    <h4 class="text-center"><strong>HISTORIAL DE VENTAS DIARIAS</strong></h4>
    <br>
    <table class="table table-hover" id="tablaVentasDiarias">
      <thead>
        <tr>
          <th scope="col">ID Venta</th>
          <th scope="col">Total venta</th>
          <th scope="col">Hora</th>
          <th scope="col">Fecha</th>
          <th scope="col">ID Crédito</th>
          <th scope="col">ID Usuario</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $SQL = "SELECT * FROM ventas";
          $resultado = Consulta($SQL);
          foreach ($resultado as $fila) {               
        ?>
        <form action="#" method="POST">
          <tr>
            <td><?php echo $fila['id_ventas'];?></td>
            <td><?php echo $fila['total_venta'];?></td>
            <td><?php echo $fila['hora'];?></td>
            <td><?php echo $fila['fecha'];?></td>
            <td><?php echo $fila['credito_id'];?></td>
            <td><?php echo $fila['usuarios_id'];?></td>
          </tr>
        </form>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</div>