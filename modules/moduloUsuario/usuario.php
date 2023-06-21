<!--Creacion del formulario para Registrar Usuarios-->
<div class="container col-6">
	<h1>Registro de usuarios</h1>
	<hr>
	<h5>Para registrar un usuario complete todos los campos</h5>
	<hr>
	<!-- action="controller/php/controladorRegistroUsuario.php" -->
	<form method="POST" >
		<?php
		//include("controller/php/conexion.php");
		include("controller/php/controladorRegistroUsuario.php");
		?>
	  <div class="form-group">
	    <label for="exampleInputEmail1" class="form-label">Nombre</label>
	    <input type="text" class="form-control" name="nombre" placeholder="Ingresa el nombre del usuario">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1" class="form-label">Usuario</label>
	    <input type="text" class="form-control" name="usuario" placeholder="Ingresa el nombre de usuario">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1" class="form-label">Numero de telefono</label>
	    <input type="" class="form-control" name="numero" placeholder="Ingresa el número de teléfono">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
	    <input type="email" class="form-control" name="correo" aria-describedby="emailHelp" placeholder="Ingresa el correo Electronico">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
	    <input type="password" class="form-control" name="password" placeholder="Ingresa la Contraseña">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1" class="form-label">Confirma la Contraseña</label>
	    <input type="password" class="form-control" name="passConf" placeholder="Confirma la Contraseña">
	  </div>
	  <div class="form-group">
	    <label style="color: black;">Selecciona el rol de usuario:</label>
	    <select class="form-select" aria-label="Default select example" name="rol" id="rol">
		  <option disabled selected hidden>Elige una opción del menú</option>
		  <option value="Admin">Administrador</option>
		  <option value="Empleado">Empleado</option>
		</select>
	  </div>
	  <div class="form-group">
	  	<br>
	  	<center>
	  <input type="submit" name="enviar" value="Registrar" class="btn btn-success">
	  </center>
	  </div>
	</form>
	<br>
</div>