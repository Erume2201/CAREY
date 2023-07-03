<!-- Modal para mostrar a detalle de pedido del cliente seleccionado-->


<div class="modal fade" id="modalVentasDiarias<?php echo $fila['id_informacion_venta']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fw-bold" id="exampleModalLabel">Detalle de la venta: Ticket <?php echo $fila ['id_ventas'];?> </h4>
      </div>
      <form action="modules/moduloClientes/ctrlDeleteCliente.php" method="POST" >
        <div class="modal-body">
          <h6><strong>Vendedor: </strong><?php echo $fila['nombre_completo'];?></h6>
          <h6><strong>Cliente: </strong><?php echo $fila['nombre_cliente'];?></h6>
          <h6><strong><?php echo $fila['fecha'] . " " . $fila['hora'];?></strong></h6>
          <hr>
          <h6><strong>Cantidad: </strong><?php echo $fila['cantidad'];?></h6>
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