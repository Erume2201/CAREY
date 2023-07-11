<!-- Creación del formulario para Registrar Usuarios -->
<div class="container col-6">
  <h1>Registro de usuarios</h1>
  <hr>
  <h5>Para registrar un usuario complete todos los campos</h5>
  <hr>

  <!-- action="controller/php/controladorRegistroUsuario.php" -->
  <form method="POST">
    <?php
    
    // include("controller/php/conexion.php");
    include("controller/php/controladorRegistroUsuario.php");
    ?>
    <div class="form-group">
      <br>
      <label for="exampleInputEmail1" class="form-label fw-bold">Nombre Completo</label>
      <input type="text" pattern=".{6,16}" title="Debe tener entre 6 y 16 caracteres" class="form-control" name="nombre" placeholder="Ingresa el nombre del usuario" maxlength="16"autocomplete="off" required>
    </div>
    <div class="form-group">
      <br>
      <label for="exampleInputEmail1" class="form-label fw-bold">Nombre de Usuario</label>
      <input type="text" pattern=".{5,10}" title="Debe tener entre 5 y 10 caracteres" class="form-control" name="usuario" maxlength="10" placeholder="Ingresa el nombre de usuario" autocomplete="off">
    </div>
    <div class="form-group">
      <br>
      <label for="exampleInputEmail1" class="form-label fw-bold">Numero de telefono</label>
      <input type="text" pattern=".{10}" title="Debe tener 10 digitos" class="form-control" name="numero" id="numero" placeholder="Ingresa el número de teléfono" maxlength="10" oninput="validarNumeros(this)" autocomplete="off">
    </div>
    <div class="form-group">
      <br>
      <label for="exampleInputEmail1" class="form-label fw-bold">Correo Electronico</label>
      <input type="email" class="form-control" name="correo" aria-describedby="emailHelp" placeholder="Ingresa el correo Electrónico" autocomplete="off">
    </div>
    <br>
    <label for="exampleInputPassword1" class="form-label fw-bold">Contraseña Genérica</label>
    <div class="form-group password-container">
    	<div id="copiar"></div>
      <div class=" col-9">
        <input type="text" class="password-field form-control" name="password" id="password" placeholder="Contraseña" autocomplete="off">
      </div>
      <div class="password-button">
        <button type="button" class="btn" onclick="Checando()">
          <img src="assets/image/copy_icon.png" width="35" height="35">
        </button>
        <button type="button" class="btn btn-primary" onclick="generarPass()">Generar</button>
      </div>
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
      <center>
        <input type="submit" name="enviar" value="Registrar" class="btn btn-primary" style="width: 200px; height: 40px; font-size: 18.5px;">
      </center>
    </div>
  </form>
  <br>
</div>

<script src="controller/javascript/helpersCopiar.js"></script>
<script src="controller/javascript/helpersUsuarios.js"></script>
