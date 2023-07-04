
<!-- Este módulo mostrará las ventas que se hayan hecho a lo largo del día-->
<div class="contenido-do row">
  <br><br>
  <div class="container col-8 text-center">
    <br>
    <h4 class="text-center"><strong>HISTORIAL DE VENTAS DIARIAS DEL DÍA <?php echo "$fecha";?></strong></h4>
    <br>
    <table class="table table-hover" id="tablaVentasDiarias">
      <thead>
        <tr>
          <th scope="col">ID Detalle de Venta</th>
          <th scope="col">Hora</th>
          <th scope="col">Documento</th>
          <th scope="col">Cliente</th>
          <th scope="col">Cantidad</th>
          <th scope="col">Ver</th>
          <th scope="col">Editar</th>
        </tr>
      </thead>
      <tbody>
        <?php
          include("modules/moduloVentas/fechaDiaria.php");
          $SQL = "SELECT v.id_ventas, v.hora, v.fecha, v.total_venta, c.nombre_cliente, u.nombre_completo, iv.id_informacion_venta, iv.cantidad, iv.sub_total, d.nombre, d.precio_venta, d.tipo FROM VENTAS v JOIN CREDITOS cr ON v.credito_id = cr.id_creditos JOIN CLIENTE c ON cr.cliente_id = c.id_cliente JOIN USUARIOS u ON v.usuarios_id = u.id_usuarios JOIN INFORMACION_VENTA iv ON v.id_ventas = iv.ventas_id JOIN DOCUMENTOS d ON iv.documentos_id = d.id_articulo_documetos WHERE DATE(v.fecha) = '$fecha' ORDER BY v.fecha DESC";
          $resultado = Consulta($SQL);
          foreach ($resultado as $fila) {               
        ?>
        <form action="#" method="POST">
          <tr>
            <td><?php echo $fila['id_informacion_venta'];?></td>
            <td><?php echo date_format(new DateTime($fila['hora']), 'H:i:s');?></td>
            <td><?php echo $fila['nombre'];?></td>
            <td><?php echo $fila['nombre_cliente'];?></td>
            <td><?php echo $fila['cantidad'];?></td>
            <td>
              <button type="button" class="btn" data-bs-toggle="modal" 
                data-bs-target="#modalVentasDiarias<?php echo $fila['id_informacion_venta'];?>" style="width: 25px; height: 25px; display: flex; align-items: center;">
                <img src="assets/image/view.png" width="25" height="25">
              </button>
            </td>
            <td>
              <button type="button" class="btn" data-bs-toggle="modal" 
                data-bs-target="#modalEditVenta<?php echo $fila['id_informacion_venta'];?>" style="width: 25px; height: 25px; display: flex; align-items: center;">
                <img src="assets/image/edit.png" width="25" height="25">
              </button>
            </td>

          </tr>
        </form>
        <?php
          include("modules/moduloVentas/modalVentasDiarias.php");
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
<!--Mandamos a llamar nuestra función para buscar en las ventas-->
<script src="controller/javascript/buscarVentasDiarias.js"></script>

<!-- Alerta de cantidad modificado -->
<div>
  <?php
  if (isset($_GET['Update'])) {
    $status = $_GET['Update'];
    if ($status == "NoActualizado") {
  ?>
      <script>
        Swal.fire({
          icon: 'error',
          title: 'Oops, algo salió mal',
          text: 'Asegurese de haber rellenado todos los campos'
        })
      </script>
    <?php
    } else {
    ?>
      <script>
        Swal.fire('Los datos de la venta se actualizaron correctamente', '', 'success')
      </script>
  <?php
    }
  }
  ?>
</div>