<!--Este módulo controlará los botones de ver, editar y eliminar-->

<?php
if (isset($_POST['dato'])) {
		$dato = $_POST['dato'];
		//echo $dato;
		$SQL  = "DELETE FROM usuarios WHERE id_usuarios = '$dato';";
	    $resultadoDelete = EliminarDato($SQL);
	    if ($resultadoDelete) {
	        echo "<script>window.location = '../karey/index.php?module=usuario'</script>";
	        ?>
	        	<div class="alert alert-danger" role="alert">
					Usuario Eliminado
				</div>
	        <?php
	    }else{
	        echo "<script>window.location = '../karey/index.php?module=usuario'</script>";
	    }
}