
<!--Creación del módulo de Configuración-->
<div class="container col-6">
	<br><br><br><br><br>
	<h1>Asignación de días</h1>
	<hr>
	<h6>Seleccione las fechas en las que se hará el corte</h6>
	<?php
	include_once("modules/moduloConfiguracion/procesar.php");
	?>
	<form method="POST">
        <label for="fecha_inicio">Desde:</label>
        <input type="date" name="fecha_inicio" required>
        <br><br>
        <label for="fecha_fin">Hasta:</label>
        <input type="date" name="fecha_fin" required>
        <br><br>
        <input type="submit" value="Guardar cambios">
    </form>
    <?php
	include_once("modules/moduloConfiguracion/guardarFecha.php");
	?>
    <hr>
    <h1>Alguna otra configuración...</h1>
</div>
