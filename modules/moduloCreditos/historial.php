<?php 
 
    $fechaInicio = '2023-06-27';
    $fechaFin= '2023-07-03';
    $SQL = "SELECT cli.id_cliente, cli.nombre_cliente,cre.estatus, 
    cli.telefono_cliente, cli.nombre_negocio, cre.fecha ,COUNT(cre.id_creditos) 
    AS total_creditos, SUM(cre.total) AS total_ventas
    FROM cliente cli
    LEFT JOIN creditos cre ON cli.id_cliente = cre.cliente_id
    Where (cre.fecha >='$fechaInicio'  AND cre.fecha <= '$fechaFin') AND cre.estatus='pendiente'
    GROUP BY cli.id_cliente, cli.nombre_cliente, cli.telefono_cliente, cli.nombre_negocio;";
    $consultarDatos2 = Consulta($SQL);
     ?>

<!-- Tabla -->
<h3>Lista de creditos de los clientes que compraron documentos en la semana actual</h3>
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
                    <th>Fecha inicio</th>
                    <th>Fecha fin</th>
                    <th>N° Documentos</th>
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
        Swal.fire('¡Error al realizar el pago!', '', 'success')
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
