
<!--Creación del submódulo de Clientes-->
<br><br>
<div class="contenido-do row">
	<br><br>
	<div class="container col-10 text-center">
		<table class="table table-hover">
		   <thead>
		    <tr>
		      <th scope="col">ID Cliente</th>
		      <th scope="col">Nombre</th>
		      <th scope="col">Teléfono</th>
		      <th scope="col">Negocio</th>
		      <th scope="col">Municipio</th>
		      <th scope="col">Estado</th>
		      <th scope="col">País</th>
		      <th scope="col">Editar</th>
		      <th scope="col">Borrar</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<!--Aquí haremos que la BD inserte los datos en la tabla-->
		  	<?php 
				$SQL = "SELECT * FROM cliente";
			    $resultado = Consulta($SQL);
			    foreach ($resultado as $fila) {               
					?>
				   	<form action="modules/moduloClientes/ctrlDeleteCliente.php" method="POST">
				        <tr>
				            <td><?php echo $fila['id_cliente'];?></td>
				            <td><?php echo $fila['nombre_cliente'];?></td>
				            <td><?php echo $fila['telefono_cliente'];?></td>
				            <td><?php echo $fila['nombre_negocio'];?></td>
				            <td><?php echo $fila['municipio'];?></td>
				            <td><?php echo $fila['estado'];?></td>
				            <td><?php echo $fila['pais'];?></td>
				            <td>
				            	<button type="button" class="btn" data-bs-toggle="modal" 
				                data-bs-target="#editModal<?php echo $fila['id_cliente'];?>" style="width: 25px; height: 25px; display: flex; align-items: center;">
				                	<img src="assets/image/edit.png" width="25" height="25">
				                </button>
				            </td>
				            <td>
				            	<button type="button" class="btn" data-bs-toggle="modal" 
				                data-bs-target="#deleteModal<?php echo $fila['id_cliente'];?>" style="width: 30px; height: 30px; display: flex; align-items: center;">
				                	<img src="assets/image/trash.png" width="30" height="30">
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

<!-- Alerta de cliente modificado -->
<div>
  <?php
  if (isset($_GET['Update'])) {
    $status = $_GET['Update'];
    if ($status == "NoActualizado") {
  ?>
      <script>
        Swal.fire({
          icon: 'error',
          title: 'Oops, algo salió mal',
          text: 'Asegurese de haber rellenado todos los campos'
        })
      </script>
    <?php
    } else {
    ?>
      <script>
        Swal.fire('Los datos del cliente han sido modificados', '', 'success')
      </script>
  <?php
    }
  }
  ?>
</div>