<!-- Modal de eliminación
El modal muestra un mensaje de confirmación para eliminar un usuario 
Incluye un formulario para enviar la confirmación de eliminación -->

<div class="modal fade" id="ModalEliminar<?php echo $fila['id_usuarios']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fw-bold" id="exampleModalLabel">Eliminar</h4>
      </div>
      <form action="controller/php/controlVerUsuarios.php" method="POST" >
      <div class="modal-body">
        <h5>Desea eliminar el usuario: <strong><?php echo $fila['nombre_completo']; ?></strong></h5>
        <input type="hidden" class="bt-5" id="dato" name="dato" value="<?php echo $fila['id_usuarios']; ?>" autocomplete="off">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger">Confirmar</button>
      </div>
      </form>
    </div>
  </div>
</div>