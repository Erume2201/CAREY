<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $fila['id_usuarios']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel" style="">Modificar Datos del Usuario: <?php echo $fila['nombre_usuario']; ?></h4>
      </div>
      <div class="modal-body">

        <!--Inicio Formulario-->
          <form action="controller/php/controlUsuariosModificar.php" method="POST" >
            <div class="form-group">
              <label for="exampleInputEmail1" class="form-label fw-bold">Nombre Completo</label>
              <input type="text" class="form-control" name="nombre" placeholder="Ingresa el nombre del usuario" value="<?php echo $fila['nombre_completo']; ?>">
            </div>
            <div class="form-group">
              <br>
              <label for="exampleInputEmail1" class="form-label fw-bold">Nombre de Usuario</label>
              <input type="text" class="form-control" name="usuario" maxlength="10" placeholder="Ingresa el nombre de usuario" value="<?php echo $fila['nombre_usuario']; ?>">
            </div>
            <div class="form-group">
              <br>
              <label for="exampleInputEmail1" class="form-label fw-bold">Numero de telefono</label>
              <input type="text" class="form-control" name="numero" id="numero" placeholder="Ingresa el número de teléfono" maxlength="10" oninput="validarNumeros(this)" value="<?php echo $fila['telefono_usuario']; ?>">
            </div>
            <div class="form-group">
              <br>
              <label for="exampleInputEmail1" class="form-label fw-bold">Correo Electronico</label>
              <input type="email" class="form-control" name="correo" aria-describedby="emailHelp" placeholder="Ingresa el correo Electronico" value="<?php echo $fila['correo']; ?>">
            </div>
            <br>
            <label for="exampleInputPassword1" class="form-label fw-bold">Contrasena Generica</label>
            <div class="form-group password-container">
              <input type="text" class="password-field form-control" name="password" id="password<?php echo $fila['id_usuarios'];?>" placeholder="Contraseña" >
              <button type="button" class="password-button btn btn-primary" value="<?php echo $fila['id_usuarios'];?>" onclick="generarPassEdi(event)">Generar</button>
            </div>

            <div class="form-group">
              <br>
              <label style="color: black;" class="form-label fw-bold">Selecciona el rol de usuario:</label>
              <br>
              <select class="form-select" aria-label="Default select example" name="rol" id="rol">
              <option disabled selected hidden>Elige una opción del menú</option>
              <option value="admin">Administrador</option>
              <option value="usuario">Empleado</option>
            </select>
            </div>

            <div class="form-group">
              <br>
              <label style="color: black;" class="form-label fw-bold">Selecciona estado de usuario:</label>
              <br>
              <select class="form-select" aria-label="Default select example" name="estado" id="estado">
              <option disabled selected hidden>Elige una opción del menú</option>
              <option value="activo">Activo</option>
              <option value="despedido">Despedido</option>
            </select>
            </div>

            <input type="hidden" class="bt-5" id="dato" name="dato" value="<?php echo $fila['id_usuarios']; ?>" autocomplete="off">
        <!--Fin Formulario-->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
     </div>
    </form>
    </div>
  </div>
</div>
