
<!--Creación del módulo de Configuración-->

<html>
<head>
    <title>Asignación de días</title>
</head>
<body>
    <div class="container col-6">
        <br><br><br><br><br>
        <h1>Asignación de días</h1>
        <hr>
        <h4>Seleccione los días en los que se hará el corte.</h4>
        <h6><strong>Aviso.</strong> La fecha DESDE no puede ser anterior a la fecha actual.</h6>
        <?php

        date_default_timezone_set('America/Mexico_City');
        $fechaActual = date('Y-m-d');

        // Update para actualizar a inactivo todas las fechas de corte anteriores a la fecha actual
        $SQL4 = "UPDATE corte SET estatus_corte = 'inactivo' WHERE hasta < '$fechaActual'";
        $resultado4 = Actualizar($SQL4);
        
        // Consulta para obtener las últimas fechas de corte registradas
        $SQL3 = "SELECT desde, hasta FROM corte WHERE estatus_corte = 'activo'";

        // Ejecutamos la consulta
        $resultado3 = Consulta($SQL3);

        // Verificar si se encontraron resultados
        if (count($resultado3) > 0) {
            foreach ($resultado3 as $fila) {
                $desde = $fila['desde'];
                $hasta = $fila['hasta'];

                // Verificar si la fecha actual es mayor que la fecha "Desde"
                if (strtotime($fechaActual) > strtotime($desde)) {
                    echo '<div class="alert alert-danger" role="alert">La fecha de corte ha caducado.</div>';
                } else {
                    echo '<div class="alert alert-success" role="alert">';
                    echo '<p>Fecha de corte activa:</p>';
                    echo '<ul>';
                    echo "<li>Desde: $desde - Hasta: $hasta</li>";
                    echo '</ul>';
                    echo '</div>';
                }
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">No hay fecha de corte activa.</div>';
        } 
        ?>

        <!-- Este formulario enviará la entrada del usuario al script "procesar.php" para su procesamiento -->
        <form method="POST">
            <?php include("modules/moduloConfiguracion/procesar.php"); ?>
            <div class="form-group">
                <label for="desde">Desde:</label>
                <select name="desde" id="desde" required onchange="actualizarHasta()">
                    <option value="Monday">Lunes</option>
                    <option value="Tuesday">Martes</option>
                    <option value="Wednesday">Miércoles</option>
                    <option value="Thursday">Jueves</option>
                    <option value="Friday">Viernes</option>
                    <option value="Saturday">Sábado</option>
                    <option value="Sunday">Domingo</option>
                </select>
            </div>
            <br>
            <div class="form-group">
            <label for="hasta">Hasta:</label>
                <select name="hasta" id="hasta">
                    <option value="Sunday">Domingo</option>
                    <option value="Monday">Lunes</option>
                    <option value="Tuesday">Martes</option>
                    <option value="Wednesday">Miércoles</option>
                    <option value="Thursday">Jueves</option>
                    <option value="Friday">Viernes</option>
                    <option value="Saturday">Sábado</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <input type="submit" name="enviarCorte" value="Guardar cambios">
            </div>
        </form>
        <script src="controller/javascript/configuracion.js"></script>
        <hr>
    </div>
</body>
</html>


