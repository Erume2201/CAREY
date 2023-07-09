<!--
Agrega un modal de confirmación para el cambio de contraseña 
El modal muestra el nombre de usuario y un campo para la nueva contraseña 
Incluye un botón para copiar la contraseña y un formulario para confirmar el cambio de contraseña 
-->

<div class="modal fade" id="confirmar<?php echo $fila['id_usuarios']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fw-bold" id="exampleModalLabel">Confirmación de cambio de contraseña</h4>
      </div>

      <form action="controller/php/controlNewPass.php" method="POST" >
      <div class="modal-body">
        <label>Cambio de contraseña para el usuario: <strong><?php echo $fila['nombre_usuario']; ?></strong></label>
        <br><br>

        <h5>Contraseña nueva: <h5 id="h5<?php echo $fila['id_usuarios']; ?>"> </h5></h5>
        <div id="copiar<?php echo $fila['id_usuarios']; ?>"></div>
        <br>
        <h7>Asegurate de guardar la contraseña nueva!!! <button type="button" class="btn btn-dark" value="<?php echo $fila['id_usuarios']; ?>"  onclick="ChecandoModal(event)">
          Copiar</button></h7>
        <br>
        <input type="hidden" class="bt-5" id="dato" name="dato" value="<?php echo $fila['id_usuarios']; ?>" autocomplete="off">
        <input type="hidden" class="password-field form-control" name="pass" id="pass<?php echo $fila['id_usuarios']; ?>" readonly>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Confirmar</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script src="controller/javascript/helpersCopiar.js"></script>