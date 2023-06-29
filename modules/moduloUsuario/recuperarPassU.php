<?php
	//echo "hola soy tu contraseña perdidad"
?>
<div class="container col-9 ">
    <h4 class="text-center">Usuarios con cambio de contraseña pendiente</h4>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Usuario</th>
          <th scope="col">Estatus</th>
          <th scope="col">Contraseña</th>
          <th scope="col">Contraseña Nueva</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $SQL = "SELECT * FROM usuarios WHERE estatus_usuarios = 'pendiente' ";
        $resultado = Consulta($SQL);
        foreach ($resultado as $fila) {
        ?>
          <form action="controller/php/controlNewPass.php" method="POST">
            <tr>
              <td><?php echo $fila['nombre_completo']; ?></td>
              <td><?php echo $fila['nombre_usuario']; ?></td>
              <td><?php echo $fila['estatus_usuarios']; ?></td>
              <td><?php echo $fila['contrasena']; ?></td>
              <td id="<?php echo $fila['id_usuarios'];?>"></td>
              <input type="hidden" id="<?php echo $fila['id_usuarios'];?>" name="<?php echo $fila['id_usuarios'];?>" value="<?php echo $fila['id_usuarios'];?>" autocomplete="off">
              <!-- Inicio de los botones -->
              <td>
                <button type="button" class="btn btn" value="<?php echo $fila['id_usuarios'];?>" 
                  onclick="generarPassNew(event)" style="width: 70px; height: 40px; display: flex; justify-content: center; align-items: center;"> Generar
                </button>
              </td>
              <td>
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#confirmar<?php echo $fila['id_usuarios']; ?>" style="width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">
                  <img src="assets/image/editar.png" width="35" height="35">
                </button>
              </td>
          <!-- Fin de los botones -->
          </tr>
          </form>
      	  <?php
      	  //modal Confirmar el cambio de contraseña
      	  include("modules/moduloUsuario/modalConfirmarPass.php");
        }
        ?>
      </tbody>
    </table>    
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
          title: 'La Contraseñas no se logro cambiar',
          text: '¡Verifique que halla generado la Contraseña nueva!!!'
        })
      </script>
    <?php
    } else {
    ?>
      <script>
        Swal.fire('¡La contraseña del usuario ha sido modificada!', '', 'success')
      </script>
  <?php
    }
  }
  ?>
</div>

  <script src="controller/javascript/helpersUsuarios.js"></script>