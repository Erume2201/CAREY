
<!-- Modal para mostrar a detalle de pedido del cliente seleccionado-->

<div class="modal fade" id="modalVentasDiarias<?php echo $fila['id_informacion_venta']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fw-bold" id="exampleModalLabel">Detalle de la venta: Ticket <?php echo $fila ['id_ventas'];?> </h4>
      </div>
      <form action="#" method="POST" >
        <div class="modal-body">
          <h6><strong>Vendedor: </strong><?php echo $fila['nombre_completo'];?></h6>
          <h6><strong>Cliente: </strong><?php echo $fila['nombre_cliente'];?></h6>
          <h6><strong><?php echo $fila['fecha'];?></strong></h6>
          <hr>
          <h6><strong>Cantidad: </strong><?php echo $fila['cantidad'];?></h6>
          <h6><strong>Precio venta: </strong><?php echo $fila['precio_venta'];?></h6>
          <h6><strong>Documento: </strong><?php echo $fila['nombre'];?></h6>
          <h6><strong>Departamento: </strong><?php echo $fila['tipo'];?></h6>
          <h6><strong>Importe: $</strong><?php echo $fila['sub_total'];?></h6>
          <h6><strong>Total: $</strong><?php echo $fila['total_venta'];?></h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Aceptar</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!--Modal para modificar un registro de venta-->

<div class="modal fade" id="modalEditVenta<?php echo $fila['id_informacion_venta']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel" style="">Modicar: <strong>Ticket <?php echo $fila['id_informacion_venta']; ?></strong></h3>
      </div>
      <!--Inicio del formulario para modificar al cliente-->
      <form action="modules/moduloVentas/ctrlEditVenta.php" method="POST" >
        <div class="modal-body">
          <h6><strong>Si al momento de registrar la venta puso una cantidad incorrecta, usted puede modificarla aquí.</strong></h6><br>
          <div class="form-group text-start">
            <label for="exampleInputEmail1" class="form-label fw-bold">Cantidad:</label>
            <input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="Ingresa el nombre del cliente" value="<?php echo $fila['cantidad']; ?>">
          </div>
          <input type="hidden" class="bt-5" id="datoEditVenta" name="datoEditVenta" value="<?php echo $fila['id_informacion_venta']; ?>" autocomplete="off">
          <input type="hidden" class="bt-5" id="PrecioVenta" name="precioVenta" value="<?php echo $fila['precio_venta']; ?>" autocomplete="off">
          <input type="hidden" class="bt-5" id="id_ventas" name="id_ventas" value="<?php echo $fila['id_ventas']; ?>" autocomplete="off">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
      </form>
    </div>
  </div>
</div>