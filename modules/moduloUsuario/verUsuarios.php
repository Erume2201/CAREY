<?php
	//echo'soy la lista de usuario';
?>

<div class="contenido-do row">
	<br><br>
	<div class="container col-8 text-center">
		<label>Aqui va la lista</label>
		<table class="table table-hover">
		   <thead>
		    <tr>
		      <th scope="col">Nombre</th>
		      <th scope="col">Usuario</th>
		      <th scope="col">Numero de telfono</th>
		      <th scope="col">Correo Electronico</th>
		      <th scope="col">Contraseña</th>
		      <th scope="col">Rol de Usuario</th>
		    </tr>
		  </thead>
		  <tbody>
		    <?php
				//include("controller/php/conexion.php");
				include("controller/php/controlVerUsuarios.php");
			?>
		  </tbody>
		</table>

	</div>
</div>

<script src="controller/javascript/helpersUsuarios.js"></script>