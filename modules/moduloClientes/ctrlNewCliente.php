
<!--Este es el controlador para agregar un nuevo cliente a la BD-->

<?php
	// Nuestro IF principal verifica si se ha enviado el formulario y se ha hecho clic en "enviar".

	if (isset($_POST['enviar'])) {

		// Colocaremos otro if para que en caso de que algún campo está vacío se envíe una alerta.
		if (empty($_POST["nombre"]) || empty($_POST["numero"]) || empty($_POST["negocio"]) || 
			empty($_POST["municipio"]) || empty($_POST["estado"]) || empty($_POST["pais"])) {
			?>
    			<div class="alert alert-danger" role="alert">Oops, algunos campos están vacíos.</div>
    		<?php
		} else {

			/* Asignamos los valores de los campos del formulario (accediendo a través del arreglo '$_POST') a variables específicas. */
			$nombre = $_POST["nombre"];
			$numero = $_POST["numero"];
			$negocio = $_POST["negocio"];
			$municipio = $_POST["municipio"];
			$estado = $_POST["estado"];
			$pais = $_POST["pais"];

			// Hacemos un consulta para verificar si existen datos en la tabla
			$SQLtel = "SELECT * FROM cliente WHERE telefono_cliente = '$numero'";
			$resul = Consulta($SQLtel);

			// Si existen datos en nuestra tabla debemos verificar que el elemento teléfono no se repita
			if (count($resul) > 0) {
				?>
		    		<div class="alert alert-danger" role="alert">
				  	El número de teléfono ya existe!
					</div>
		    	<?php
			} else {

				// Ahora insertaremos los datos en la BD.
				$SQL = "INSERT INTO cliente (nombre_cliente, telefono_cliente, nombre_negocio, municipio, estado, pais) VALUES ('$nombre', '$numero', '$negocio', '$municipio', '$estado', '$pais')";
				$resultado = InsertarDato($SQL);
				
				// Ahora agregamos una condicional para verificar la respuesta de la BD.
				if ($resultado) {
					?>
						<div class="alert alert-success" role="alert">El registro fue exitoso.</div>
					<?php
				} else {
					?>
						<div class="alert alert-danger" role="alert">Algo salió mal, por favor intentelo de nuevo.</div>
					<?php
				}
			}
		}
	}
?>