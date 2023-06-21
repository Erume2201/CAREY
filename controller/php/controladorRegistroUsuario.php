<?php

if (isset($_POST['enviar'])) {
    if (empty($_POST["nombre"]) || empty($_POST["numero"]) || empty($_POST["correo"]) || empty($_POST["password"]) || empty($_POST["passConf"]) || empty($_POST["rol"])) {
    	?>
    		<div class="alert alert-danger" role="alert">
			  Algunos campos estan vacios!
			</div>
    	<?php
        //echo 'no se envio vro';
        // Additional code...
    }else {
    	//Variables que guardan los datos del usuario
    	 $nombre = $_POST["nombre"];
		 $numero = $_POST["numero"];
		 $correo = $_POST["correo"];
		 $password = $_POST["password"];
		 $passConf = $_POST["passConf"];
		 $rol = $_POST["rol"];
		 $conexion = obtenerConexion();

		 //Validacion de las contraseñas
		 if ($password==$passConf) {
		 	//enviamos los datos a la bd
		 	$sql=$conexion->query("insert into usuarios(nombre,numero,correo,contrasena,rol_usuario) 
    		value('$nombre','$numero','$correo','$password','$rol')");

	    	//verificamos la respuesta de la bd
	    	if($sql==1){
	    		?>
			    	<div class="alert alert-success" role="alert">
					  El usuario se registro correctamente!
					</div>
			    <?php
	    	}else{
	    		?>
			    	<div class="alert alert-danger" role="alert">
					  Algo salio mal al momento de guardar los datos
					</div>
			    <?php
	    		}
	   		}else{
	   			?>
			    	<div class="alert alert-danger" role="alert">
					  Contraseñas no coinciden!
					</div>
			    <?php
	   		}
		 }
    	
}
?>
