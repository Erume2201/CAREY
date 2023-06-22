<?php 

	$SQL = "SELECT * FROM usuarios";
    $resultado = Consulta($SQL);
    $filas = count($resultado);               
    if (!empty($resultado)) {
        for ($i = 0; $i < $filas; $i++) {
	        echo '
	            <tr>
	                <td>'.$resultado[$i]['nombre'].'</td>
	                <td>'.$resultado[$i]['usuario'].'</td>
	                <td>'.$resultado[$i]['numero'].'</td>
	                <td>'.$resultado[$i]['correo'].'</td>
	                <td>'.$resultado[$i]['contrasena'].'</td>
	                <td>'.$resultado[$i]['rol_usuario'].'</td>
	                <td><button type="button" class="btn btn-secondary" style="width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">
	                	<img src="assets/image/delete_icon.png" width="35" height="35">
	                </button</td>
	            </tr>
	        ';}
    } else {              
    	echo 'erro al conectar a la base de datos';
    }
?>