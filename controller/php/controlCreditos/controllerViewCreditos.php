<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtención de las fechas de corte "DESDE" y "HASTA"
    $fecha_seleccionada = $_POST['fecha_credito'];
    $SQL = "SELECT cli.id_cliente, cli.nombre_cliente, cli.telefono_cliente, cli.nombre_negocio, cre.fecha ,COUNT(cre.id_creditos) AS total_creditos, SUM(cre.total) AS total_ventas
    FROM cliente cli
    LEFT JOIN creditos cre ON cli.id_cliente = cre.cliente_id
    WHERE cre.fecha='$fecha_seleccionada'
    GROUP BY cli.id_cliente, cli.nombre_cliente, cli.telefono_cliente, cli.nombre_negocio;";
    $consultarDatos = Consulta($SQL);
    // Validación de las fechas
    if (empty($consultarDatos)) {
        ?>
<script>
Swal.fire({
    position: 'center',
    icon: 'info',
    title: 'No se han encontrado créditos en la fecha seleccionada',
    showConfirmButton: true,
    timer: 2000
})
</script>
<?php
    } else {
        ?>
<hr>
<div>
    <div class="container">
        <div style="text-align: right;">
        <h3>
        Fecha consultada: <?php echo $fecha_seleccionada; ?>
    </h3>
            <h3 style="text-align: center;">Ingresa el nombre del cliente:</h3>
            <br>
            <div class="container-fluid col-12" >
              <!--  <form class="d-flex">-->
                    <input class="form-control me-2 light-table-filter" data-table="table_id" type="text"
                        placeholder="Ingresa el nombre del cliente" style="text-align: center" id="buscadorBloque">
             <!--   </form>-->
            </div>
        </div>
    </div>
    <br><br>
    <div class="container-do row">
        <div class="container col-8">
            <table class="table table-hover table-sm table-bordered table_id" id="table">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Id Cliente</th>
                        <th>Nombre Cliente</th>
                        <th>Telefono</th>
                        <th>Empresa</th>
                        <th>Fecha</th>
                        <th>N° Documentos</th>
                        <th>Venta total</th>
                        <th>Documentos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($consultarDatos as $fila) { ?>
                    <tr>
                        <td><?php echo $fila['id_cliente']; ?></td>
                        <td><?php echo $fila['nombre_cliente']; ?></td>
                        <td><?php echo $fila['telefono_cliente']; ?></td>
                        <td><?php echo $fila['nombre_negocio']; ?></td>
                        <td><?php echo $fila['fecha']; ?></td>
                        <td><?php echo $fila['total_creditos']; ?></td>
                        <td><?php echo $fila['total_ventas']; ?></td>
                        <td>
                            <form method="POST">
                                <div>
                                    <input class="form-control" type="hidden" name="fecha_credito"
                                        value="<?php echo $fecha_seleccionada; ?>">
                                        <input class="form-control" type="hidden" name="fechaDiaBusqueda"
                                        value="<?php echo $fecha_seleccionada; ?>">
                                    <input class="form-control" type="hidden" name="id_cliente"
                                        value="<?php echo $fila['id_cliente']; ?>">
                                    <center><input class="btn btn-warning" type="submit" value="Ver"  style="height: 4rem; width: 6rem;"></center>
                                </div>
                                <br>
                            </form>
                        </td>

                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
    }
}
?>
    <?php
    include_once("controller/php/controlCreditos/subDatosTabla.php");
?>
<script src="controller/javascript/buscador.js"></script>
