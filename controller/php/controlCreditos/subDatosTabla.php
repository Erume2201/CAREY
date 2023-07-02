<?php 
 if (isset($_POST['id_cliente'])) {
    $idCliente = $_POST['id_cliente'];
    $fechaDia= $_POST['fechaDiaBusqueda'];
    
     $SQL2 = "SELECT cli.id_cliente, cli.nombre_cliente, cli.telefono_cliente, 
     cli.nombre_negocio, cre.estatus, cre.fecha, cre.total
     FROM creditos cre
     JOIN cliente cli ON cli.id_cliente=cre.cliente_id
     Where cli.id_cliente =$idCliente  AND cre.fecha='$fechaDia';";
     $consultarDatos2 = Consulta($SQL2);
     ?>
     
     <!-- Termina el modal -->
     <hr>
     <h3>Documentos comprados por: <?php echo $consultarDatos2[0]['nombre_cliente'];?> el dia <?php echo $fechaDia;?></h3>
      <div class="container-do row">
                    <div class="container col-8">
                        <table class="table table-hover table-sm table-bordered" id="table">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>Id Cliente</th>
                                    <th>Nombre Cliente</th>
                                    <th>Telefono</th>
                                    <th>Empresa</th>
                                    <th>Estatus</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
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
                                    <td><?php echo $fila2['fecha']; ?></td>
                                    <td><?php echo $fila2['total']; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
<?php
 }
?>