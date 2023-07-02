<!-- Este módulo mostrará las ventas que se hayan hecho a lo largo del día-->
<br><br><br><br><br><br>
<div class="contenido-do row">
    <br><br>
    <h4 class="text-center"><strong>Historial de ventas de la semana: </strong></h4>
    <br>
    <div class="col-10">
        <div class="accordion" id="">
            <?php
            // Obtener los valores enviados por el formulario
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            $SQL = "SELECT creditos.cliente_id, cliente.nombre_cliente, ventas.credito_id ,
            SUM(ventas.total_venta)AS Total_compra
            FROM creditos
            JOIN ventas ON creditos.id_creditos= ventas.credito_id
            JOIN cliente ON cliente.id_cliente= creditos.cliente_id
            GROUP BY creditos.cliente_id;";
            $resultado = Consulta($SQL);
            foreach ($resultado as $cliente) {
            ?>
                <div class="accordion-item">
                    <h4>Cliente:</h4>
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#<?php echo $cliente['cliente_id']; ?>" aria-expanded="false" 
                        aria-controls="<?php echo $cliente['cliente_id']; ?>">
                            <?php echo $cliente['nombre_cliente']; ?>
                        </button>
                    </h2>
                    <div id="<?php echo $cliente['cliente_id']; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tablaSemanales" style="margin-left: 20px; margin-right: 20px;">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID Venta</th>
                                            <th scope="col">Cliente</th>
                                            <th scope="col">Municipio</th>
                                            <th scope="col">Documentos</th>
                                            <th scope="col">Cantidad del documento</th>
                                            <th scope="col">total del documento</th>
                                            <th scope="col">total de la venta</th>
                                            <th scope="col">Credito total</th>
                                            <th scope="col">Estatus del credito</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $SQL2 = "SELECT ventas.id_ventas,  cliente.nombre_cliente,
                                        cliente.municipio, documentos.nombre, 
                                        informacion_venta.cantidad, informacion_venta.sub_total, 
                                        ventas.total_venta,  creditos.total,  creditos.estatus 
                                     FROM documentos
                                     JOIN informacion_venta ON documentos.id_articulo_documetos=informacion_venta.documentos_id
                                     JOIN ventas ON ventas.id_ventas = informacion_venta.ventas_id
                                     JOIN creditos ON creditos.id_creditos=ventas.credito_id
                                     JOIN cliente ON  cliente.id_cliente= creditos.cliente_id
                                     WHERE cliente.id_cliente = '".$cliente['cliente_id']."'";
                                        $resultado = Consulta($SQL2);
                                        foreach ($resultado as $fila) {
                                        ?>
                                            <form action="#" method="POST">
                                                <tr>
                                                    <td><?php echo $fila['id_ventas']; ?></td>
                                                    <td><?php echo $fila['nombre_cliente']; ?></td>
                                                    <td><?php echo $fila['municipio']; ?></td>
                                                    <td><?php echo $fila['nombre']; ?></td>
                                                    <td><?php echo $fila['cantidad']; ?></td>
                                                    <td><?php echo $fila['sub_total']; ?></td>
                                                    <td><?php echo $fila['total_venta']; ?></td>
                                                    <td><?php echo $fila['total']; ?></td>
                                                    <td><?php echo $fila['estatus']; ?></td>
                                                </tr>
                                            </form>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    <?php
                                    $documentos = "SELECT SUM(informacion_venta.cantidad) AS cantidadDoc  FROM informacion_venta
                                    JOIN ventas ON ventas.id_ventas=informacion_venta.ventas_id
                                    JOIN creditos ON creditos.id_creditos= ventas.credito_id
                                    WHERE creditos.cliente_id = '".$cliente['cliente_id']."';";
                                    $respuesta = Consulta($documentos);
                                    $respuesta[0]['cantidadDoc'];
                                    ?>
                                    <tr>
                                        <td> Total de la semana: $<?php echo $cliente['Total_compra']; ?></td>
                                        <td id="CantidaTabla">Cantidad de documentos: <?php echo $respuesta[0]['cantidadDoc'];?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            <?php
            }
            ?>
        </div>
       <div>
        <form action="modules/moduloVentas/EnvioWhatsApp.php" method="POST">
        <button class="btn btn-success" type="submit">Enviar</button>
        </form>
       </div>
    </div>
</div>
<div>
  <?php
  if (isset($_GET['EnvioWhatsApp'])) {
    $status = $_GET['EnvioWhatsApp'];
    if ($status == "Realizado") {
  ?>
      <script>
        Swal.fire('Mensaje enviado!', '', 'success')
      </script>
    <?php
    } else {
    ?>
      <script>
        Swal.fire({
          icon: 'error',
          title: 'No se pudo enviar el mensaje',
          text: 'Asista a soporte tecnico!'
        })
      </script>
  <?php
    }
  }
  ?>
</div>