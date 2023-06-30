
<!--Creación del módulo de Configuración-->
<div class="container col-6">
	<br><br><br><br><br>
	<h1>Asignación de días</h1>
	<hr>
	<h6>Seleccione los días en los que se hará el corte</h6>
	<?php
	include_once("modules/moduloConfiguracion/procesar.php");
	?>
	<form method="POST">
        <label for="desde">Desde:</label>
        <select name="desde" required>
            <option value="lunes">Lunes</option>
            <option value="martes">Martes</option>
            <option value="miercoles">Miércoles</option>
            <option value="jueves">Jueves</option>
            <option value="viernes">Viernes</option>
            <option value="sabado">Sábado</option>
            <option value="domingo">Domingo</option>
        </select>
        <br><br>
        <label for="hasta">Hasta:</label>
        <select name="hasta" required>
            <option value="lunes">Lunes</option>
            <option value="martes">Martes</option>
            <option value="miercoles">Miércoles</option>
            <option value="jueves">Jueves</option>
            <option value="viernes">Viernes</option>
            <option value="sabado">Sábado</option>
            <option value="domingo">Domingo</option>
        </select>
        <br><br>
        <input type="submit" value="Guardar cambios">
    </form>
    <hr>
    <h1>Alguna otra configuración...</h1>
</div>
