
<!-- Modal para eliminar un cliente-->

<div class="modal fade" id="deleteModal<?php echo $fila['id_cliente']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fw-bold" id="exampleModalLabel">Eliminar</h4>
      </div>
      <form action="modules/moduloClientes/ctrlVerCliente.php" method="POST" >
        <div class="modal-body">
          <h4>¿Está seguro de eliminar a <strong><?php echo $fila['nombre_cliente'];?>?</strong></h4>
          <h6>¡Si elimina este cliente se eliminará toda la información relacionado a el!</h6>
          <input type="hidden" class="bt-5" id="datoDelete" name="datoDelete" value="<?php echo $fila['id_cliente']; ?>" autocomplete="off">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Confirmar</button>
        </div>
      </form>
    </div>
  </div>
</div>

