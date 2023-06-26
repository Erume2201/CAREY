
<!--Este controlador es para que podamos visualizar a los clientes-->
<?php 
	$SQL = "SELECT * FROM cliente";
    $resultado = Consulta($SQL);
    $filas = count($resultado);               
    if (!empty($resultado)) {
        for ($i = 0; $i < $filas; $i++) {
	        echo '
	            <tr>
	                <td>'.$resultado[$i]['id_cliente'].'</td>
	                <td>'.$resultado[$i]['nombre_cliente'].'</td>
	                <td>'.$resultado[$i]['nombre_negocio'].'</td>
	                <td>
	                	<button type="button" name="view" id="view" class="btn" style="width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">
	                		<img src="assets/image/view.png" width="30" height="30">
	                	</button
	                </td>
	                <td>
	                	<button type="button" name="edit" id="edit" class="btn" style="width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">
	                		<img src="assets/image/edit.png" width="25" height="25">
	                	</button
	                </td>
	                <td>
	                	<button type="button" name="delete" id="delete" class="btn" style="width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">
	                		<img src="assets/image/trash.png" width="30" height="30">
	                	</button
	                </td>
	            </tr>
	        ';}
    } else {              
    	echo '<div style="color: red;">Error al conectar a la base de datos</div>';
    }
?>