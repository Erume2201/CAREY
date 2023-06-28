<!-- Modal -->
<div class="modal fade" id="confirmar<?php echo $fila['id_usuarios']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fw-bold" id="exampleModalLabel">Confirmación de cambio de contraseña</h4>
      </div>
      <form action="controller/php/controlNewPass.php" method="POST" >
      <div class="modal-body">
        <h5>Cambio de contraseña para el usuario: <strong><?php echo $fila['nombre_usuario']; ?></strong></h5>
        <br>
        <h5 id="h5">Contraseña nueva: </h5>
        <h7>(Asegurate de guardar la contraseña nueva!!!)</h7>
        <input type="hidden" class="bt-5" id="dato" name="dato" value="<?php echo $fila['id_usuarios']; ?>" autocomplete="off">
        <input type="hidden" class="password-field form-control" name="pass" id="pass">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Confirmar</button>
      </div>
      </form>
    </div>
  </div>
</div>