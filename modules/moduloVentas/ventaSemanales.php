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
            $queryFecha = "SELECT desde, hasta FROM corte ORDER BY id_corte DESC LIMIT 1;";
            $fechas = Consulta($queryFecha);

            $SQL = "SELECT creditos.cliente_id, cliente.nombre_cliente, ventas.credito_id,
            SUM(ventas.total_venta) AS Total_compra, cliente.telefono_cliente
            FROM creditos
            JOIN ventas ON creditos.id_creditos = ventas.credito_id
            JOIN cliente ON cliente.id_cliente = creditos.cliente_id
            WHERE ventas.fecha >= '" . $fechas[0]['desde'] . "' AND ventas.fecha <= '" . $fechas[0]['hasta'] . "'
            GROUP BY creditos.cliente_id;";
            $resultado = Consulta($SQL);
            foreach ($resultado as $cliente) {
            ?>
                <div class="accordion-item">
                    <h4 style="margin-left:20px;">Cliente:</h4>
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $cliente['cliente_id']; ?>" aria-expanded="false" aria-controls="<?php echo $cliente['cliente_id']; ?>">
                            <?php echo $cliente['nombre_cliente']; ?> Telefono: <?php echo $cliente['telefono_cliente']; ?>
                        </button>
                        <input type="hidden" class="nombrewhat" id="<?php echo $cliente['cliente_id']; ?>" value="<?php echo $cliente['nombre_cliente']; ?>">
                        <input type="hidden" class="celWhat" id="<?php echo "cel". $cliente['cliente_id']; ?>" value="<?php echo $cliente['telefono_cliente']; ?>">
                    </h2>
                    <div id="<?php echo $cliente['cliente_id']; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tablaSemanales" style="margin-left: 20px; margin-right: 20px;">
                                    <thead class="table-dark">
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
                                     WHERE cliente.id_cliente = '" . $cliente['cliente_id'] . "' AND 
                                      ventas.fecha >= '" . $fechas[0]['desde'] . "' AND ventas.fecha <= '" . $fechas[0]['hasta'] . "'";
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
                                    WHERE creditos.cliente_id = '" . $cliente['cliente_id'] . "' AND 
                                    ventas.fecha >= '" . $fechas[0]['desde'] . "' AND ventas.fecha <= '" .$fechas[0]['hasta']. "'";
                                    $respuesta = Consulta($documentos);
                                    $respuesta[0]['cantidadDoc'];
                                    ?>
                                    <tr>
                                        <td id="TotalPago"> Total de la semana: $<?php echo $cliente['Total_compra']; ?></td>
                                        <td id="CantidadTabla">Cantidad de documentos: <?php echo $respuesta[0]['cantidadDoc']; ?></td>
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
            
            <!--Nuevo datos-->
            <?php
            $maximoTotal="SELECT SUM(ventas.total_venta)AS maximo FROM ventas
            WHERE  ventas.fecha >= '".$fechas[0]['desde']."' AND ventas.fecha <= '".$fechas[0]['hasta']."';";
            $respuestaMaxima = Consulta($maximoTotal);
            ?>
            <form id="informesEnviar" action="modules/informes/informes.php" method="POST">
                <div class="accordion-item">
                    <h4 style="margin-left:20px;">Documentos</h4>
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#Documentos" aria-expanded="false" aria-controls="Documentos">
                            Informacion de documentos
                        </button>
                    </h2>
                    <input type="hidden" class="" id="FechaInicio" name="FechaInicio" value="<?php echo $fechas[0]['desde']." "."00:00:00"?>">
                    <input type="hidden" class="" id="FechaFin" name="FechaFin" value="<?php echo $fechas[0]['hasta']." "."00:00:00"?>">

                    <div id="Documentos" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tablaSemanales" style="margin-left: 20px; margin-right: 20px;">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Documentos</th>
                                            <th scope="col">Cantidad del documento</th>
                                            <th scope="col">total del documento</th>
                                            <th scope="col">Precio costo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $SQLdocumentos="SELECT documentos.id_articulo_documetos, documentos.nombre, documentos.precio_costo, documentos.precio_venta,
                                        SUM(informacion_venta.cantidad)AS cantidades, SUM(informacion_venta.sub_total)AS Total FROM informacion_venta
                                        JOIN documentos ON documentos.id_articulo_documetos=informacion_venta.documentos_id
                                        JOIN ventas ON ventas.id_ventas=informacion_venta.ventas_id
                                        WHERE ventas.fecha >= '".$fechas[0]['desde']."' AND ventas.fecha <= '".$fechas[0]['hasta']."'
                                        GROUP BY documentos.id_articulo_documetos;";
                                        $resultadoDoc = Consulta($SQLdocumentos);
                                        foreach ($resultadoDoc as $documento) {
                                        ?>
                                        <tr>
                                            <td><?php echo $documento['nombre']; ?></td>
                                            <input type="hidden" class="idInformeDocumento" id="" name="idInformeDocumento[]" 
                                            value="<?php echo $documento['id_articulo_documetos']; ?>">

                                            <td><?php echo $documento['cantidades']; ?></td>
                                            <input type="hidden" class="cantidadDocumento" id="cantidadDocumento" name="cantidadDocumento[]" 
                                            value="<?php echo $documento['cantidades']; ?>">

                                            <td><?php echo $documento['Total']; ?></td>
                                            <input type="hidden" class="" id="TotalDocumento" name="TotalDocumento[]" 
                                            value="<?php echo $documento['Total']; ?>">

                                            <td><?php echo $documento['precio_costo']; ?></td>
                                            <input type="hidden" class="precioCostoDoc" id="precioCostoDoc" 
                                            value="<?php echo $documento['precio_costo']; ?>">
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <input type="hidden" class="" id="precioFinal" name="precioFinal" value="<?php echo $respuestaMaxima[0]['maximo'] ?>">
                                <input type="hidden" class="" id="gananciaSemanal" name="gananciaSemanal" value="0">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-2" style="position: fixed; right: 0; margin-top: 50px;">
        <div class="">
            <button class="btn btn-success mb-5" onclick="DatosWhatsApp()" type="button">Enviar por WhatsApp</button>
            <button class="btn btn-primary mb-5" onclick="EnviarInforme()" type="button">Guardar corte</button>
        </div>
        <div class="row">
            <form class="form-floating">
                <input type="email" class="form-control is-invalid" id="floatingInputInvalid" placeholder="name@example.com" value="<?php echo $respuestaMaxima[0]['maximo'] ?>" readonly>
                <label for="floatingInputInvalid">Total de la semana</label>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <div class="modal popup" id="datosWhatsApp">
        <div class="modal-dialog modal-lg modal-dialog-left">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fw-bold" style="margin-left: 30px;">Detalles:</h2>
                    <button onclick="CerrarWhatsApp()" type="button" class="btn btn-danger" data-dismiss="modal">x</button>
                </div>
                <div class="modal-body">
                    <form id="DatosWhatsApp" action="modules/moduloVentas/EnvioWhatsApp.php" method="POST">
                        <div class="row" id="">
                            <div class="alert alert-warning" role="alert">
                                Seleciona el cliente para enviar el whatsApp!
                            </div>
                            <h5>Nombre cliente:</h5>
                            <select id="ClienteWha" class="form-select form-select-sm" aria-label=".form-select-sm example">

                            </select>
                            <br>
                            <h5>Numero de telefono:</h5>
                            <p id="NumeroCliente">Numero: </p>
                            <input type="hidden" class="" id="NumeroRecibido" name="NumeroRecibido" value="0">
                        </div>
                    </form>
                    <p id="Alerta"></p>
                    <div class="col-6">
                        <button class="btn btn-success" onclick="EjecutarWhat()" id="">Enviar:</button>
                    </div>
                </div>
            </div>
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
<div>
    <?php
    if (isset($_GET['Informe'])) {
        $status = $_GET['Informe'];
        if ($status == "Realizado") {
    ?>
            <script>
                Swal.fire('Informe guardado!', '', 'success')
            </script>
        <?php
        } else {
        ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'No se pudo guardar el informe',
                    text: 'Asista a soporte tecnico!'
                })
            </script>
    <?php
        }
    }
    ?>
</div>
<script src="controller/javascript/ventaSemanal/Semanal.js"></script>