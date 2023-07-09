<!--Creación del submódulo de créditos-->

<br>

<!--Creación del módulo de Configuración-->

<div class="container col-6">
	<h3>Seleccione una fecha, para consultar los créditos de un día en especifico</h3>
	<form method="POST">
		<div>
			<input type="date" name="fecha_credito" required>
		</div>
		<br>
		<input class="btn btn-warning" type="submit" value="Consultar Créditos">
    </form>
</div>

<?php
	include_once("controller/php/controlCreditos/controllerViewCreditos.php");
	?>

