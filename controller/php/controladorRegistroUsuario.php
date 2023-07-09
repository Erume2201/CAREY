<?php

if (isset($_POST['enviar'])) {
	//Verificacion de los campos vacios
    if (empty($_POST["nombre"]) || empty($_POST["numero"]) || empty($_POST["correo"]) ||
	 empty($_POST["password"])|| empty($_POST["rol"]) || empty($_POST["usuario"])) 
	{
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
		 $rol = $_POST["rol"];
		 $verdadNombre = false;
		 $verdadUsuario = false;
		 $verdadCorreo = false;
		 $verdadTel = false;

    	//Realizamos la consulta a la bd
		 $SQL = "SELECT * FROM usuarios ";
    	 $resultadoConsulta = Consulta($SQL);
    	 $filas = count($resultadoConsulta);
		 //Verificacion nombre
    	for ($i = 0; $i < $filas; $i++) {
    		if ($resultadoConsulta[$i]['nombre_completo'] == $nombre) {
    			$verdadNombre = true;
    		}
    	}
    	//Verificacion nombre de usuario
    	for ($i = 0; $i < $filas; $i++) {
    		if ($resultadoConsulta[$i]['nombre_usuario'] == $usuario) {
    			$verdadUsuario=true;
    		}
    	}
    	//Verificacion numero de telefono
    	for ($i = 0; $i < $filas; $i++) {
    		if ($resultadoConsulta[$i]['telefono_usuario'] == $numero) {
    			$verdadTel=true;
    		}
    	}
    	//Verificacion correo electronico
    	for ($i = 0; $i < $filas; $i++) {
    		if ($resultadoConsulta[$i]['correo'] == $correo) {
    			$verdadCorreo=true;
    		}
    	}
    	//Validadcion y verificación de los datos 
    	if ($verdadNombre) {
    		?>
		    	<div class="alert alert-danger" role="alert">
				  El nombre ya se ha registrado!!!
				</div>
		    <?php
    	}elseif ($verdadUsuario) {
    		?>
		    	<div class="alert alert-danger" role="alert">
				  El nombre de usuario ya se ha registrado!!!
				</div>
		    <?php
    	}elseif ($verdadTel) {
    		?>
		    	<div class="alert alert-danger" role="alert">
				  El Numero de telefono ya se ha registrado!!!
				</div>
		    <?php
    	}elseif ($verdadCorreo) {
    		?>
		    	<div class="alert alert-danger" role="alert">
				  El Correo Electronico ya se ha registrado!!!
				</div>
		    <?php
    	}else {

    			//cifrado de contraseña
				$encryptedPassword = md5($password);
				//enviamos los datos a la bd
				$SQL = "insert into usuarios(nombre_completo, nombre_usuario, telefono_usuario, correo, contrasena, rol_usuario, estatus_usuarios) 
		    		value('$nombre','$usuario','$numero','$correo','$encryptedPassword','$rol','generica')";
		            
		        $resultadoInsert = Actualizar($SQL);

				 	/*$sql=$conexion->query("insert into usuarios(nombre,numero,correo,contrasena,rol_usuario) 
		    		value('$nombre','$numero','$correo','$encryptedPassword','$rol')"); **/

			    //verificamos la respuesta de la bd
			    if($resultadoInsert){
			    	?>
				    	<div class="alert alert-success" role="alert">
						  El usuario se registro correctamente!!!
						</div>
				    <?php
			    }else{
			    	?>
				    	<div class="alert alert-danger" role="alert">
						  Algo salio mal al momento de guardar los datos!!!
						</div>
				    <?php
    		}//cierre del else de la resuesta de la bd

	   	}//cierre del else de la validacion de los datos
	 }//cierre del else de la verificacion de los campos
}//cierre del if del boton enviar
?>
