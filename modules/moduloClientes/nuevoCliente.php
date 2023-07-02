
<!--Creación del submódulo nuevo cliente-->
<div class="container">
	<div class="row">
		<div class="col-6">
			<br>
			<h1>Nuevo cliente</h1>
			<hr>
			<h6>Para registrar un nuevo cliente por favor rellene todos los campos.</h6>
			<form method="POST" >
				<?php
				include("modules/moduloClientes/ctrlNewCliente.php");
				?>
				<div class="form-group">
					<label for="exampleInputEmail1" class="form-label">Nombre:</label>
			    	<input type="text" class="form-control" name="nombre" placeholder="Ingresa el nombre del cliente" autocomplete="off">
				</div>
				<br>
				<div class="form-group">
					<label for="exampleInputEmail1" class="form-label">Teléfono:</label>
			    	<input type="text" class="form-control" name="numero" id="numero" placeholder="Ingresa el número de teléfono" maxlength="10" oninput="validarNumeros(this)" autocomplete="false">
				</div>
				<br>
				<div class="form-group">
					<label for="exampleInputEmail1" class="form-label">Nombre del negocio:</label>
					<input type="text" class="form-control" name="negocio" id="negocio" placeholder="Ingresa el nombre del negocio" autocomplete="off">
				</div>
				<br>
				<div class="form-group">
					<label for="exampleInputEmail1" class="form-label">Municipio:</label>
					<input type="text" class="form-control" name="municipio" id="municipio" placeholder="Ingresa el nombre del Municipio" autocomplete="off">
				</div>
				<br>
				<div class="form-group">
					<label>Estado:</label>
					<br>
						<select class="form-select" aria-label="Default select example" name="estado" id="estado">
							<option disabled selected>Selecciona el Estado</option>
							<option value="Aguas-Calientes">Aguas Calientes</option>
							<option value="Baja-California">Baja California</option>
							<option value="Baja-California-Sur">Baja California Sur</option>
							<option value="Campeche">Campeche</option>
							<option value="Coahuila">Coahuila</option>
							<option value="Colima">Colima</option>
							<option value="Chiapas">Chiapas</option>
							<option value="Chihuahua">Chihuahua</option>
							<option value="DF">Ciudad de México</option>
							<option value="Durango">Durango</option>
							<option value="Guanajuato">Guanajuato</option>
							<option value="Guerrero">Guerrero</option>
							<option value="Hidalgo">Hidalgo</option>
							<option value="Jalisco">Jalisco</option>
							<option value="Estado-Mexico">Estado de México</option>
							<option value="Michoacan">Michoacán</option>
							<option value="Morelos">Morelos</option>
							<option value="Nayarit">Nayarit</option>
							<option value="Nuevo-Leon">Nuevo León</option>
							<option value="Oaxaca">Oaxaca</option>
							<option value="Puebla">Puebla</option>
							<option value="Queretaro">Querétaro</option>
							<option value="QuintanaRoo">Quintana Roo</option>
							<option value="San-Luis">San Luis Potosí</option>
							<option value="Sinaloa">Sinaloa</option>
							<option value="Sonora">Sonora</option>
							<option value="Tabasco">Tabasco</option>
							<option value="Tamaulipas">Tamaulipas</option>
							<option value="Tlaxcala">Tlaxcala</option>
							<option value="Veracruz">Veracruz</option>
							<option value="Yucatan">Yucatán</option>
							<option value="Zacatecas">Zacatecas</option>
						</select>
				</div>
				<br>
				<div class="form-group">
					<label>País:</label>
					<br>
						<select class="form-select" aria-label="Default select example" name="pais" id="pais">
							<option disabled selected>Selecciona el País</option>
							<option value="Mexico">México (predeterminado)</option>
						</select>
				</div>
				<br>
				<div class="form-group">
					<br>
					<center>
						<input type="submit" name="enviar" value="Registrar" class="btn btn-primary" style="width: 200px; height: 40px; font-size: 18.5px;">
				  	</center>
			  	</div>
			</form>
			<br>
		</div>
	</div>
</div>
<script src="controller/javascript/helpersUsuarios.js"></script>