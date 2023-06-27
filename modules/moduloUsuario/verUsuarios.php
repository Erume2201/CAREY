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
				$SQL = "SELECT * FROM usuarios";
    			$resultado = Consulta($SQL);
    			foreach($resultado as $fila){ ?>
    				<form action="controller/php/controlVerUsuarios.php" method="POST">
    				<tr>
    					<td><?php echo $fila['nombre_completo']; ?></td>
    					<td><?php echo $fila['nombre_usuario']; ?></td>
    					<td><?php echo $fila['telefono_usuario']; ?></td>
    					<td><?php echo $fila['correo']; ?></td>
    					<td><?php echo $fila['contrasena']; ?></td>
    					<td><?php echo $fila['rol_usuario']; ?></td>
    					<input type="hidden" class="bt-5" id="dato" 
                   		name="dato"
                  		value="<?php echo $fila['id_usuarios'];?>" autocomplete="off" 
						>
						<input type="hidden" class="bt-5" id="modi" 
	                   		name="modi"
	                  		value="<?php echo $fila['id_usuarios'];?>'" autocomplete="off" 
						>
						<td><button type="submit " name="delete" id="delete" class="btn btn-primary" style="width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">
	                		<img src="assets/image/delete_icon.png" width="35" height="35">
	                	</button>
	                	</td>
						<td>
		                <button type="submit" name="udate" id="udate" class="btn btn-primary" style="width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">
		                		<img src="assets/image/update_folder_icon.png" width="35" height="35">
		                </button>
	                	</td>
    				</tr>
    				</form>
			<?php
	          	}
	        ?>
		  </tbody>
		</table>
	</div>
</div>

<script src="controller/javascript/helpersUsuarios.js"></script>