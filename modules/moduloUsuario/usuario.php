<?php
//echo "hola  soy usuario";
?>
<!--Creacion del formulario para Registrar Usuarios-->
<div class="container col-6">
	<h1>Registro de usuarios</h1>
	<h5>Para registrar un usuario complete todos los campos</h5>

	<?php
		
		include("controller/php/controladorRegistroUsuario.php");
	?>

	<hr>
	<form method="POST" class="form-label">
	  <div class="mb-3">
	    <label for="exampleInputEmail1" class="form-label">Nombre</label>
	    <input type="text" class="form-control" name="nombre" placeholder="Escribe el nombre">
	  </div>
	  <div class="mb-3">
	    <label for="exampleInputEmail1" class="form-label">Numero de telefono</label>
	    <input type="text" class="form-control" name="numero" placeholder="Escribe el numero de telefono">
	  </div>
	  <div class="mb-3">
	    <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
	    <input type="email" class="form-control" name="correo" aria-describedby="emailHelp" placeholder="Escribe el correo Electronico">
	  </div>
	  <div class="mb-3">
	    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
	    <input type="password" class="form-control" name="password" placeholder="Escribe la Contraseña">
	  </div>
	  <div class="mb-3">
	    <label for="exampleInputPassword1" class="form-label">Confirma la Contraseña</label>
	    <input type="password" class="form-control" name="passConf" placeholder="Escribe la Contraseña">
	  </div>
	  <!--<div class="mb-3 ">
	    <label for="exampleInputEmail1" class="form-label">Selecciona el Rol del usuario</label>
	    <select class="form-select" aria-label="Default select example" id="rol">
		  <option disabled selected hidden>Selecciona una opción del menu</option>
		  <option value="1">Administrador</option>
		  <option value="2">Empleado</option>
		</select>
	  </div> -->
	  <input class="btn btn-primary" type="button" value="Registrar" name="r">
	  <input class="btn btn-primary" type="submit" value="Registrar" id="registrar">
	</form>
	<br>
</div>