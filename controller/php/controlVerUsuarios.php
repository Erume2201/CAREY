<?php 

	$SQL = "SELECT * FROM usuarios";
    $resultado = Consulta($SQL);
    $filas = count($resultado);
    if($filas == 0){
    	echo '
    			<td>Tablas sin xpath_register_ns_auto(xpath_context)</td>
    		';
    } else{
    	if (!empty($resultado)) {
        for ($i = 0; $i < $filas; $i++) {
        	$id = $resultado[$i]['id_usuarios'];
	        echo '
	            <tr>
	            <form action=""controller/php/controlVerUsuarios.php"" method="POST">
	                <td>'.$resultado[$i]['nombre_completo'].'</td>
	                <td>'.$resultado[$i]['nombre_usuario'].'</td>
	                <td>'.$resultado[$i]['telefono_usuario'].'</td>
	                <td>'.$resultado[$i]['correo'].'</td>
	                <td>'.$resultado[$i]['contrasena'].'</td>
	                <td>'.$resultado[$i]['rol_usuario'].'</td>
	                <input type="hidden" class="bt-5" id="dato" 
                   		name="dato"
                  		value="'.$resultado[$i]['id_usuarios'].'" autocomplete="off" 
					>
					<input type="hidden" class="bt-5" id="dato" 
                   		name="modi"
                  		value="'.$resultado[$i]['nombre_usuario'].'" autocomplete="off" 
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
	            </form>
	            </tr>
	        ';}
    } else {              
    	echo '<div style="color: red;">Error al conectar a la base de datos</div>';
    }
    }              
    


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

if(isset($_POST['delete'])){
  		$valor = $_POST['delete'];
  		echo $valor;
  	}

?>