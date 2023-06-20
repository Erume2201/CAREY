
<!--Creación del módulo de Configuración-->
<div class="container col-6">
	<br>
	<h1>Corte de fecha</h1>
	<hr>
	<h6>Seleccione las fechas:</h6>
	<form method="POST" action="modules/moduloConfiguracion/procesar.php">
        <label for="fecha_inicio">Desde:</label>
        <input type="date" name="fecha_inicio" required>
        <br><br>
        <label for="fecha_fin">Hasta:</label>
        <input type="date" name="fecha_fin" required>
        <br><br>
        <input type="submit" value="Guardar cambios">
    </form>
</div>
