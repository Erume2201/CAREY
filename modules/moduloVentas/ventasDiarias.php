
<!-- Este módulo mostrará las ventas que se hayan hecho a lo largo del día-->
<br><br><br><br><br><br>
<div class="contenido-do row">
  <br><br>
  <div class="container col-8 text-center">
    <h4 class="text-center"><strong>Historial de ventas del día: </strong></h4>
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