<?php

if (isset($_POST['enviar'])) {
    if (empty($_POST["nombre"]) || empty($_POST["numero"]) || empty($_POST["correo"]) || empty($_POST["password"]) || empty($_POST["passConf"]) || empty($_POST["rol"]) || empty($_POST["usuario"])) {
    	?>
    		<div class="alert alert-danger" role="alert">
			  Algunos campos estan vacios!
			</div>
    	<?php
        
    }else {
    	//Variables que guardan los datos del usuario
    	 $nombre = $_POST["nombre"];
    	 $usuario= $_POST["usuario"];
		 $numero = $_POST["numero"];
		 $correo = $_POST["correo"];
		 $password = $_POST["password"];
		 $passConf = $_POST["passConf"];
		 $rol = $_POST["rol"];

		 //Validacion de las contraseñas
		 if ($password==$passConf) {
		 	//cifrado de contraseña
			$encryptedPassword = md5($password);
		 	//enviamos los datos a la bd
			$SQL = "insert into usuarios(nombre,usuario,numero,correo,contrasena,rol_usuario,estatus_usuario) 
    		value('$nombre','$usuario','$numero','$correo','$encryptedPassword','$rol','Disponible')";
            
             $resultadoInsert = Actualizar($SQL);

		 	/*$sql=$conexion->query("insert into usuarios(nombre,numero,correo,contrasena,rol_usuario) 
    		value('$nombre','$numero','$correo','$encryptedPassword','$rol')"); */

	    	//verificamos la respuesta de la bd
	    	if($resultadoInsert){
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
