
<?php
# include "controller/php/CRUD.php";
// Recuperar el valor de idCliente enviado por la solicitud AJAX
/*
$idCliente = $_POST['idCliente'];
#consulta numero 2 para agregar datos al modal
$nuevoidCliente = $idCliente;
echo  $nuevoidCliente;
/*
$SQL = "SELECT cli.id_cliente, cli.nombre_cliente, cli.telefono_cliente, cli.nombre_negocio, cre.estatus, cre.fecha, cre.total
FROM creditos cre
JOIN cliente cli ON cli.id_cliente=cre.cliente_id
Where cli.id_cliente = $nuevoidCliente;";
$consultarDatos = Consulta($SQL);
*/
// Resto del código del modal...
?>


<!-- Modal -->
<div class="modal fade modal-lg" id="verDocumentos" 
tabindex="-1" aria-labelledby="verDocumentosLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="verDocumentosLabel">Documentos comprados de:</h1>
      </div>
      <!-- Cuerpo del modal-->
      <div class="modal-body">
        <?php $idCliente = $_POST['idCliente'];
          #consulta numero 2 para agregar datos al modal
          $nuevoidCliente = $idCliente;
          echo  $nuevoidCliente;?>
        
        <!--Contenido modal  encabezados-->
        
            <div class="container col-12">
                <table class="table table-hover table-sm table-bordered">
                   <thead class="table-striped text-center">
                    <tr>
                      <th scope="col">Id Cliente</th>
                      <th scope="col">Nombre cliente</th>
                      <th scope="col">Telefono cliente</th>
                      <th scope="col">Nombre negocio</th>
                      <th scope="col">fecha</th>
                      <th scope="col">N° Documentos</th>
                      <th scope="col">Costo Total</th>
                      <th scope="col">Información</th>

                    </tr>
                  </thead>
                </table>
            </div>  
       
      </div> 
      <!--Termina cuerpo de modal-->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>