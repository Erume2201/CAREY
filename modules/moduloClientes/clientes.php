
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
				            <td>
				            	<button type="button" class="btn" data-bs-toggle="modal" 
				                data-bs-target="#deleteModal<?php echo $fila['id_cliente'];?>" style="width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">
				                	<img src="assets/image/trash.png" width="35" height="35">
				                </button>
				            </td>
				        </tr>
				    </form>
				    <?php
				  include("modules/moduloClientes/ClienteModal.php");
				}
				?>
		  </tbody>
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
          text: 'Verifica que el cliente no tenga un crédito pendiente'
        })
      </script>
    <?php
    } else {
    ?>
      <script>
        Swal.fire('¡El cliente ha sido eliminado!', '', 'success')
      </script>
  <?php
    }
  }
  ?>
</div>