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
    echo '
	            <tr>
	                <td>pech</td>
	                <td>pech</td>
	                <td>pech</td>
	                <td>pech</td>
	                <td>pech</td>
	                <td>pech</td>
	            </tr>
	        ';
    }
                    


/*
	$SQL = "SELECT * FROM usuarios";

	$resultadoSelect = Consulta($SQL);

	if (!empty($resultadoSelect)) {
	    foreach ($resultadoSelect as $fila) {
	        echo '
	            <tr>
	                <td>'.$fila[1].'</td>
	                <td>hoka</td>
	                <td>hoka</td>
	                <td>hoka</td>
	                <td>hoka</td>
	                <td>hoka</td>
	            </tr>
	        ';
	    }
	} else {
	    echo 'No se encontraron resultados.';
	}*/

?>