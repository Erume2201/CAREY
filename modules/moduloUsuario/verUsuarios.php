<?php
	//echo'soy la lista de usuario';
?>
<div class="contenido-do row">
  <br><br>
  <div class="container col-9 text-center ">
    <label>Aquí va la lista</label>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Usuario</th>
          <th scope="col">Número de teléfono</th>
          <th scope="col">Correo Electrónico</th>
          <th scope="col">Contraseña</th>
          <th scope="col">Rol de Usuario</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $SQL = "SELECT * FROM usuarios";
        $resultado = Consulta($SQL);
        foreach ($resultado as $fila) {
        ?>
          <form class="formulario" id="<?php echo "FormularioEliminar" . $fila['id_usuarios']; ?>" action="controller/php/controlVerUsuarios.php" method="POST">
            <tr>
              <td><?php echo $fila['nombre_completo']; ?></td>
              <td><?php echo $fila['nombre_usuario']; ?></td>
              <td><?php echo $fila['telefono_usuario']; ?></td>
              <td><?php echo $fila['correo']; ?></td>
              <td><?php echo $fila['contrasena']; ?></td>
              <td><?php echo $fila['rol_usuario']; ?></td>
              <!-- Datos -->
              <input type="hidden" class="bt-5" id="dato" name="dato" value="<?php echo $fila['id_usuarios']; ?>" autocomplete="off">
              <!-- Fin de los Datos -->
              <!-- Inicio de los botones -->
              <td>
                <button type="submit" name="delete" id="delete" class="btn" style="width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">
                  <img src="assets/image/eliminar.png" width="35" height="35">
                </button>
              </td>
          <td>
            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $fila['id_usuarios']; ?>" style="width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">
              <img src="assets/image/editar.png" width="35" height="35">
            </button>
          </td>
          <!-- Fin de los botones -->
          </tr>
          </form>
      	  <?php
      	  include("modules/moduloUsuario/modalEditarU.php")
      	  ?>
          
		   <!-- Fin Modal -->
        <?php
        }
        ?>
      </tbody>
      <?php  ?>
    </table>
  </div>
</div>




<!-- Alerta de Usuario Eliminado -->
<div>
  <?php
  if (isset($_GET['Delete'])) {
    $status = $_GET['Delete'];
    if ($status == "NoBorrado") {
  ?>
      <script>
        Swal.fire({
          icon: 'error',
          title: 'Algo salió mal',
          text: '¡Asista a soporte técnico!'
        })
      </script>
    <?php
    } else {
    ?>
      <script>
        Swal.fire('¡Usuario Eliminado!', '', 'success')
      </script>
  <?php
    }
  }
  ?>
</div>

<!-- Alerta de Usuario Modificado -->
<div>
  <?php
  if (isset($_GET['Update'])) {
    $status = $_GET['Update'];
    if ($status == "NoActualizado") {
  ?>
      <script>
        Swal.fire({
          icon: 'error',
          title: 'El Usuario no se logro modificar',
          text: '¡Verifique que halla llenado todos los campos!!!'
        })
      </script>
    <?php
    } else {
    ?>
      <script>
        Swal.fire('¡Datos de Usuario Modificados!', '', 'success')
      </script>
  <?php
    }
  }
  ?>
</div>

<script src="controller/javascript/helpersUsuarios.js"></script>

