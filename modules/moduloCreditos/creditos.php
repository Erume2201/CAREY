
<!--Creación del submódulo de créditos-->
<br><br>
<div class="contenido-do row">
	<br><br>
	<div class="container col-8 text-center">
		<table class="table table-hover">
		   <thead>
		    <tr>
		      <th scope="col">ID Créditos</th>
		      <th scope="col">Estatus</th>
		      <th scope="col">Fecha</th>
		      <th scope="col">Total</th>
		      <th scope="col">ID Clientes</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<!--Aquí haremos que la BD inserte los datos en la tabla-->
		  	<?php 
				$SQL = "SELECT * FROM creditos";
			    $resultado = Consulta($SQL);
			    foreach ($resultado as $fila) {               
					?>
				        <tr>
				            <td><?php echo $fila['id_creditos'];?></td>
				            <td><?php echo $fila['estatus'];?></td>
				            <td><?php echo $fila['fecha'];?></td>
				            <td><?php echo $fila['total'];?></td>
				            <td><?php echo $fila['cliente_id'];?></td>
				        </tr>
				    <?php
				}
				?>
		  </tbody>
		</table>

	</div>
</div>
