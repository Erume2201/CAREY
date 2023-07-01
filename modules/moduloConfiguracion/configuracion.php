<!DOCTYPE html>
<html>
<head>
    <title>Asignación de días</title>
</head>
<body>
    <!--Creación del módulo de Configuración-->
    <div class="container col-6">
        <br><br><br><br><br>
        <h1>Asignación de días</h1>
        <hr>
        <h6>Seleccione los días en los que se hará el corte</h6>
        <?php
        include("modules/moduloConfiguracion/procesar.php");
        ?>
        <form method="POST">
            <label for="desde">Desde:</label>
            <select name="desde" id="desde" required>
                <option value="Monday">Lunes</option>
                <option value="Tuesday">Martes</option>
                <option value="Wednesday">Miércoles</option>
                <option value="Thursday">Jueves</option>
                <option value="Friday">Viernes</option>
                <option value="Saturday">Sábado</option>
                <option value="Sunday">Domingo</option>
            </select>
            <br><br>
            <label for="hasta">Hasta:</label>
            <select name="hasta" id="hasta" required>
                <option value="Monday">Lunes</option>
                <option value="Tuesday">Martes</option>
                <option value="Wednesday">Miércoles</option>
                <option value="Thursday">Jueves</option>
                <option value="Friday">Viernes</option>
                <option value="Saturday">Sábado</option>
                <option value="Sunday">Domingo</option>
            </select>
            <br><br>
            <input type="submit" value="Guardar cambios">
        </form>
        <hr>
        <h1>Alguna otra configuración...</h1>
    </div>
</body>
</html>

