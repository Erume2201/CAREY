
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
        <h6><strong>Aviso.</strong> La fecha DESDE no puede ser posterior a la fecha actual.</h6>
        <?php 
        
        // Consulta para obtener las últimas fechas de corte registradas
        $SQL3 = "SELECT desde, hasta
         FROM corte
         ORDER BY desde DESC
         LIMIT 1";

        // Ejecutamos la consulta
        $resultado3 = Consulta($SQL3);

        // Verificar si se encontraron resultados
        if (count($resultado3) > 0) {
            echo '<div class="alert alert-success" role="alert">';
            echo '<p>Última fecha de corte registrada:</p>';
            echo '<ul>';
            foreach ($resultado3 as $fila) {
                $desde = $fila['desde'];
                $hasta = $fila['hasta'];
                echo "<li>Desde: $desde - Hasta: $hasta</li>";
            }
            echo '</ul>';
            echo '</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">No hay fechas de corte activas.</div>';
        } 
        ?>

        <!-- Este formulario enviará la entrada del usuario al script "procesar.php" para su procesamiento -->
        <form method="POST">
            <?php include("modules/moduloConfiguracion/procesar.php"); ?>
            <div class="form-group">
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
            </div>
            <br>
            <div class="form-group">
            <label for="hasta">Hasta:</label>
                <select name="hasta" id="hasta" required>
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
        <hr>
    </div>
</body>
</html>

