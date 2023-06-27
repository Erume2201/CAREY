
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
			// Ahora insertaremos los datos en la BD.
			$SQL = "INSERT INTO cliente (nombre_cliente, telefono_cliente, nombre_negocio, municipio, estado, pais) VALUES ('$nombre', '$numero', '$negocio', '$municipio', '$estado', '$pais')";
			$llaveCliente = insertarDatosDoble($SQL);
			// Aquí mismo le crearemos su crédito inicial al cliente.
			$SQL2 = "INSERT INTO creditos (estatus, fecha, total, cliente_id) VALUES ('Inicial', 'x', '0.0', '$llaveCliente')";
			$resultado = InsertarDato($SQL2);
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
?>