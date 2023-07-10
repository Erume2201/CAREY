<?php 
    #consultar fecha actual
    $SQLFechaActual = "SELECT desde, hasta
    FROM corte
    ORDER BY hasta DESC
    LIMIT 1;";
 #Consulta de creditos de la semana actual y asignar
    $consultaFecha = Consulta($SQLFechaActual);
    $fechaInicio = $consultaFecha[0]['desde'];
    $fechaFin = $consultaFecha[0]['hasta'];
   
/**
 * El siguiente método consulta los datos de la semana actual
 * para mandarlo a la tabla.
 */
    $SQL = "SELECT cli.id_cliente, cli.nombre_cliente,cre.estatus, 
    cli.telefono_cliente, cli.nombre_negocio, cre.fecha ,COUNT(cre.id_creditos) 
    AS total_creditos, SUM(cre.total) AS total_ventas
    FROM cliente cli
    LEFT JOIN creditos cre ON cli.id_cliente = cre.cliente_id
    Where (cre.fecha >='$fechaInicio'  AND cre.fecha <= '$fechaFin') AND cre.estatus='pendiente'
    GROUP BY cli.id_cliente, cli.nombre_cliente, cli.telefono_cliente, cli.nombre_negocio;";
    $consultarDatos2 = Consulta($SQL);
   
 /**
  * Consulta datos vencidos de la db
  * creada el 04-07-2023
  */
  $SQLVencidos = "SELECT cli.id_cliente, cli.nombre_cliente,cre.estatus, 
  cli.telefono_cliente, cli.nombre_negocio ,COUNT(cre.id_creditos) 
  AS total_creditos, SUM(cre.total) AS total_ventas
  FROM cliente cli
  LEFT JOIN creditos cre ON cli.id_cliente = cre.cliente_id
  WHERE cre.fecha NOT BETWEEN '$fechaInicio' AND '$fechaFin' AND cre.estatus='pendiente'
  GROUP BY cli.id_cliente, cli.nombre_cliente, cli.telefono_cliente, cli.nombre_negocio;";
  $consultarDatosVencidos = Consulta($SQLVencidos);



 /**
  * Consultar datos pagados de cada cliente durante la semana
  * consulta creada 04-07-2023
  */
 $SQLpagados = "SELECT cli.id_cliente, cli.nombre_cliente,cre.estatus, 
 cli.telefono_cliente, cli.nombre_negocio, cre.fecha ,COUNT(cre.id_creditos) 
 AS total_creditos, SUM(cre.total) AS total_ventas
 FROM cliente cli
 LEFT JOIN creditos cre ON cli.id_cliente = cre.cliente_id
 Where (cre.fecha >='$fechaInicio'  AND cre.fecha <= '$fechaFin') AND cre.estatus='pagado'
 GROUP BY cli.id_cliente, cli.nombre_cliente, cli.telefono_cliente, cli.nombre_negocio;";
 $consultarDatosPagados = Consulta($SQLpagados);
  ?>


<!-- Acordeon -->
<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Créditos de la semana actual
            </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">

                <!-- Tabla 01 para documentos vendidos en la semana -->
                <!--Buscador-->
                <div class="row">
                    <div class="col-3">
                        <!-- Contenido de la primera columna -->
                    </div>
                    <div class="col-6">
                        <!-- Contenido de la segunda columna -->
                    </div>
                    <div class="col-3">
                        <!-- Contenido de la tercera columna -->
                        <center><label class="form-label fw-bold">Buscar cliente</label></center>
                        <input class="form-control me-2 light-table-filter" data-table="table_id" type="text"
                            placeholder="Ingresa el nombre del cliente" style="text-align: center" id="buscadorBloque">
                    </div>
                </div>


                <!-- Buscador-->
                <!-- Tabla -->
                <h3>Lista de créditos de los clientes que compraron documentos en la semana actual</h3>
                <div class="container-do row">
                    <div class="container col-8">
                        <table class="table table-hover table-sm table-bordered table_id" id="table">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>Id Cliente</th>
                                    <th>Nombre Cliente</th>
                                    <th>Telefono</th>
                                    <th>Empresa</th>
                                    <th>Estatus</th>
                                    <th>Fecha inicio</th>
                                    <th>Fecha fin</th>
                                    <th>N° de créditos</th>
                                    <th>Total</th>
                                    <th>Pagar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($consultarDatos2 as $fila2) { ?>
                                <tr>
                                    <td><?php echo $fila2['id_cliente']; ?></td>
                                    <td><?php echo $fila2['nombre_cliente']; ?></td>
                                    <td><?php echo $fila2['telefono_cliente']; ?></td>
                                    <td><?php echo $fila2['nombre_negocio']; ?></td>
                                    <td><?php echo $fila2['estatus']; ?></td>
                                    <td><?php echo $fechaInicio ?></td>
                                    <td><?php echo $fechaFin ?></td>
                                    <td><?php echo $fila2['total_creditos']; ?></td>
                                    <td><?php echo $fila2['total_ventas']; ?></td>
                                    <td> <button type="button" class="btn" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal<?php echo $fila2['id_cliente']; ?>"
                                            style="width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">
                                            <img src="assets/image/pagar-credito.png" width="35" height="35">
                                        </button></td>
                                </tr>

                                <?php 
                include("controller/php/controlCreditos/modalCliente.php");
            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Termina Tabla 01 para documentos vendidos en la semana -->
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Créditos vencidos
            </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">

                <!-- Tabla 02 para documentos vencidos en la semana -->
                <!--Buscador-->
                <div class="row">
                    <div class="col-3">

                        <!-- Contenido de la primera columna -->
                    </div>
                    <div class="col-6">

                        <!-- Contenido de la segunda columna -->
                    </div>
                    <div class="col-3">

                        <!-- Contenido de la tercera columna -->
                        <center><label class="form-label fw-bold">Buscar cliente</label></center>
                        <input class="form-control me-2 light-table-filter" data-table="table_vencidos" type="text"
                            placeholder="Ingresa el nombre del cliente" style="text-align: center" id="buscadorBloque">
                    </div>
                </div>


                <!-- Buscador-->
                <!-- Tabla -->
                <h3>Lista de créditos vencidos</h3>
                <div class="container-do row">
                    <div class="container col-8">
                        <table class="table table-hover table-sm table-bordered table_vencidos" id="table">
                            <thead class="table-dark text-center">
                                
                                <tr>
                                    <th>Id Cliente</th>
                                    <th>Nombre Cliente</th>
                                    <th>Telefono</th>
                                    <th>Empresa</th>
                                    <th>Estatus</th>
                                    <th>Inicio Actual</th>
                                    <th>Fin Actual</th>
                                    <th>N° Créditos</th>
                                    <th>Total</th>
                                    <th>Pagar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($consultarDatosVencidos as $fila3) { ?>
                                <tr>
                                    <td><?php echo $fila3['id_cliente']; ?></td>
                                    <td><?php echo $fila3['nombre_cliente']; ?></td>
                                    <td><?php echo $fila3['telefono_cliente']; ?></td>
                                    <td><?php echo $fila3['nombre_negocio']; ?></td>
                                    <td><?php echo $fila3['estatus']; ?></td>
                                    <td><?php echo $fechaInicio; ?></td>
                                    <td><?php echo $fechaFin; ?></td>
                                    <td><?php echo $fila3['total_creditos']; ?></td>
                                    <td><?php echo $fila3['total_ventas']; ?></td>
                                    <td> <button type="button" class="btn" data-bs-toggle="modal"
                                            data-bs-target="#CreditosVencidos<?php echo $fila3['id_cliente']; ?>"
                                            style="width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">
                                            <img src="assets/image/pagar-credito.png" width="35" height="35">
                                        </button></td>
                                </tr>

                                <?php 
                include("controller/php/controlCreditos/modalCreditoVencido.php");
            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Termina Tabla 02 para documentos vendidos en la semana -->

            </div>
        </div>
    </div>

    <!-- Inicia item-03 -->
    
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                Créditos pagados en la semana actual
            </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">

                <!-- Tabla 02 para documentos vendidos en la semana -->
                <!--Buscador-->
                <div class="row">
                    <div class="col-3">
                        <!-- Contenido de la primera columna -->
                    </div>
                    <div class="col-6">
                        <!-- Contenido de la segunda columna -->
                    </div>
                    <div class="col-3">
                        <!-- Contenido de la tercera columna -->
                        <center><label class="form-label fw-bold">Buscar cliente</label></center>
                        <input class="form-control me-2 light-table-filter" data-table="table_creditosPagados" type="text"
                            placeholder="Ingresa el nombre del cliente" style="text-align: center" id="buscadorBloque">
                    </div>
                </div>


                <!-- Buscador-->
                <!-- Tabla -->
                <h3>Lista de créditos pagados</h3>
                <div class="container-do row">
                    <div class="container col-8">
                        <table class="table table-hover table-sm table-bordered table_creditosPagados" id="table">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>Id Cliente</th>
                                    <th>Nombre Cliente</th>
                                    <th>Telefono</th>
                                    <th>Empresa</th>
                                    <th>Estatus</th>
                                    <th>Fecha inicio</th>
                                    <th>Fecha fin</th>
                                    <th>N° de créditos</th>
                                    <th>Total</th>
                                 
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($consultarDatosPagados as $fila2) { ?>
                                <tr>
                                    <td><?php echo $fila2['id_cliente']; ?></td>
                                    <td><?php echo $fila2['nombre_cliente']; ?></td>
                                    <td><?php echo $fila2['telefono_cliente']; ?></td>
                                    <td><?php echo $fila2['nombre_negocio']; ?></td>
                                    <td><?php echo $fila2['estatus']; ?></td>
                                    <td><?php echo $fechaInicio ?></td>
                                    <td><?php echo $fechaFin ?></td>
                                    <td><?php echo $fila2['total_creditos']; ?></td>
                                    <td><?php echo $fila2['total_ventas']; ?></td>   
                                </tr>

                                <?php 
            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Termina Tabla 02 para documentos vendidos en la semana -->

            </div>
        </div>
    </div>

    <!-- Termina item-03-->
</div>
</div>




<!-- Alerta de Usuario Modificado -->
<div>
    <?php
  if (isset($_GET['Update'])) {
    $status = $_GET['Update'];
    if ($status == "NoPagado") {
  ?>
    <script>
    Swal.fire({
        icon: 'error',
        title: 'El Usuario no se logro modificar',
        text: '¡Verifique que halla llenado todos los campos!!!'
    })
    </script>
    <?php
    } else if($status == "NoPagado1"){
    ?>
    <script>
    Swal.fire('¡Error al realizar el pago!', '', 'error')
    </script>
    <?php
    }else{
        ?>
    <script>
    Swal.fire('¡Pago realizado con exito!', '', 'success')
    </script>
    <?php

    }
}
    ?>
    <script src="controller/javascript/buscador.js"></script>