
<!--Este módulo controlará los botones de ver, editar y eliminar-->

<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../controller/php/CRUD.php'; 

	if (isset($_POST['delete'])) {
		$dato = $_POST['datoDelete'];
		$querySaldo = "SELECT total FROM creditos WHERE cliente_id = '$dato'";
		if ($querySaldo != 0) {
			?>
			   	<div class="alert alert-danger" role="alert">
					  No es posible eliminar al cliente seleccionado debido a que tiene un crédito pendiente.
				</div>
			<?php
		} else {
			$SQL = "DELETE FROM cliente WHERE id_cliente = '$dato'";
			$resultado = EliminarDato($SQL);
			if ($resultado) {
				?>
					<div class="alert alert-success" role="alert"> El cliente fue eliminado exitosamente.
					</div>
				<?php 
				echo "<script>window.location = '../../index.php?module=clientes&Delete=Borrado'</script>";
			} else {
				echo "<script>window.location = '../../index.php?module=clientes&Delete=NoBorrado'</script>";
				?>
					<div class="alert alert-danger" role="alert">
				  	Ocurrió un error, el cliente no pudo ser eliminado.
					</div>
				<?php
			}
		}
	}
?>