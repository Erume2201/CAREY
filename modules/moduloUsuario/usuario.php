<?php
//echo "hola  soy usuario";
?>
//Creacion del formulario para Registrar Usuarios
<div class="container">
	<h1>Registro de usuarios</h1>
	<legend>Para completar el registro del usuario complete todos los campos</legend>
	<hr>
	<form>
	  <div class="mb-3">
	    <label for="exampleInputEmail1" class="form-label">Nombre</label>
	    <input type="text" class="form-control" id="nombre" placeholder="Escribe tu nombre">
	  </div>
	  <div class="mb-3">
	    <label for="exampleInputEmail1" class="form-label">Numero de telefono</label>
	    <input type="text" class="form-control" id="numero" placeholder="Escribe tu numero de telefono">
	  </div>
	  <div class="mb-3">
	    <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
	    <input type="email" class="form-control" id="correo" aria-describedby="emailHelp" placeholder="Escribe tu correo Electronico">
	  </div>
	  <div class="mb-3">
	    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
	    <input type="password" class="form-control" id="contraseña" placeholder="Escribe tu Contraseña">
	  </div>
	  <div class="mb-3 ">
	    <label for="exampleInputEmail1" class="form-label">Selecciona el Rol del usuario</label>
	    <select class="form-select" aria-label="Default select example">
		  <option selected>Selecciona una opción del menu</option>
		  <option value="1">Administrador</option>
		  <option value="2">Empleado</option>
		  <option value="3">Nada</option>
		</select>
	  </div>
	  <input class="btn btn-primary" type="submit" value="Submit">
	</form>
	<br>
</div>