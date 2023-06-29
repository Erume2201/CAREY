
<?php
/*
#consulta numero 2 para agregar datos al modal
$nuevoidCliente = $fila['id_cliente'];;
$SQLConsulta2 = "SELECT cli.id_cliente, cli.nombre_cliente, cli.telefono_cliente, cli.nombre_negocio, cre.estatus, cre.fecha, cre.total
FROM ventas ven 
JOIN creditos cre ON ven.credito_id=cre.id_creditos 
JOIN cliente cli ON cli.id_cliente=cre.cliente_id
Where cli.id_cliente =$nuevoidCliente;";
$consultarDatos1 =Consulta($SQLConsulta2);
*/
?>

<!-- Modal -->
<div class="modal fade" id="verDocumentos<?php echo $fila['id_cliente'];?>" tabindex="-1" aria-labelledby="verDocumentosLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="verDocumentosLabel">Documentos comprados de: <?php echo $fila['nombre_cliente'];?></h1>
      </div>
      <!-- Cuerpo del modal-->
      <div class="modal-body">
        <?php 
        #consulta numero 2 para agregar datos al modal
            $nuevoidCliente = $fila['id_cliente'];;
            $SQLConsulta2 = "SELECT cli.nombre_cliente, cli.telefono_cliente, cli.nombre_negocio, cre.estatus, cre.fecha, cre.total
            FROM creditos cre  
            JOIN cliente cli ON cli.id_cliente=cre.cliente_id
            WHERE cli.id_cliente=$nuevoidCliente;";
            $consultarDatos1 =Consulta($SQLConsulta2);

        ?>
        <!--Contenido modal  encabezados-->
       
      </div> 
      <!--Termina cuerpo de modal-->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>