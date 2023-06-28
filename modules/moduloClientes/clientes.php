
<!--Creación del submódulo de Clientes-->
<br><br>
<div class="contenido-do row">
	<br><br>
	<div class="container col-8 text-center">
		<table class="table table-hover">
		   <thead>
		    <tr>
		      <th scope="col">ID Cliente</th>
		      <th scope="col">Nombre</th>
		      <th scope="col">Negocio</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<!--Aquí haremos que la BD inserte los datos en la tabla-->
		  	<?php 
				$SQL = "SELECT * FROM cliente";
			    $resultado = Consulta($SQL);
			    foreach ($resultado as $fila) {               
					?>
				   	<form action="modules/moduloClientes/ctrlVerCliente.php" method="POST">

				        <tr>
				            <td><?php echo $fila['id_cliente'];?></td>
				            <td><?php echo $fila['nombre_cliente'];?></td>
				            <td><?php echo $fila['nombre_negocio'];?></td>
				           	<input type="hidden" class="bt-5" id="datoView" name="datoView"
                  			value="<?php echo $fila['id_cliente'];?>" autocomplete="off">
                  			<input type="hidden" class="bt-5" id="datoEdit" name="datoEdit"
                  			value="<?php echo $fila['id_cliente'];?>" autocomplete="off">
                  			<input type="hidden" class="bt-5" id="datoDelete" name="datoDelete"
                  			value="<?php echo $fila['id_cliente'];?>" autocomplete="off">
				            <td>
				               	<button type="submit" name="view" id="view" class="btn" style="width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">
				                	<img src="assets/image/view.png" width="30" height="30">
				               	</button>
				            </td>
				            <td>
				                <button type="submit" name="edit" id="edit" class="btn" style="width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">
				                	<img src="assets/image/edit.png" width="25" height="25">
				                </button>
				            </td>
				            <td>
				                <button type="submit" name="delete" id="delete" class="btn" style="width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">
				                	<img src="assets/image/trash.png" width="30" height="30">
				                </button>
				            </td>
				        </tr>
				    <?php
				}
				?>
		  </tbody>
		</table>

	</div>
</div>
