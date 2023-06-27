<?php

?>
<br>
<br>
<div class="contenido-do row">
  <div class="col-12">
    <div class="album py-5 bg-body-tertiary">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <?php
          //para mostrar errore de la consulta al servidor
          ini_set('display_errors', 1);
          ini_set('display_startup_errors', 1);
          error_reporting(E_ALL);

          // Ejecutar el query utilizando la conexión y capturar los resultados
          $query = "SELECT * FROM documentos";
          $resultados = Consulta($query);
          #$resultados los obtiene el CRUD aqui ya solo tenemos el resultado en un ARRAY
          // Trabajar con los resultados
          foreach ($resultados as $fila) {
          ?>
            <div class="col">
              <div class="card shadow-sm">
                <!--mandamos el docuemto seleccionado para el borrado o modificado-->
                <form id="<?php echo "FormularioEliminar" . $fila['id_articulo_documetos']; ?>" action="modules/moduloArticulos/InsertarDocumentos.php" method="POST">
                  <img class="bd-placeholder-img " src="assets/image/documentos.png" height="100" width="100" style="display: block; margin: 0 auto;">
                  <br>
                  <h4 class="NombreModifica" style="margin-left: 20px;"> <?php echo $fila['nombre']; ?></h4>
                  <!--datos que se deben mostrar cuando se haga click al ver-->
                  <input type="hidden" class="PrecioModifica" value="<?php echo $fila['precio_costo']; ?>">
                  <input type="hidden" class="descripcionModifi" value="<?php echo $fila['descripcion']; ?>">
                  <input type="hidden" class="TipoModifica" value="<?php echo $fila['tipo']; ?>">

                  <div class="card-body">
                    <label style="margin-left: 8px;" for="">Precio:</label>
                    <label for="">$</label>
                    <p class="card-text PrecioVModificar" style="margin-left: 8px;"><?php echo $fila['precio_venta']; ?> </p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <button onclick="VentanaEmergente()" type="button" class="btn btn-primary">Seleccionar</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary btn-detalle" onclick="detalles()">Ver</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <div class="modal popup" id="popup" role="dialog" aria-labelledby="popupLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="popupLabel">Selecciona un cliente</h5>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" onclick="CerrarEmergente()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Contenido del modal aquí -->
        <!--class="form-inline"-->
        <form id="">
          <div class="form-group">
            <input type="text" id="search-input" placeholder="Buscar...">
            <button type="" class="btn btn-primary">Buscar</button>
          </div>
        </form>
        <br>
        <?php
        $SQL = "SELECT * FROM cliente";
        $resultado = Consulta($SQL);
        ?>
        <div class="row">
          <div class="col-md-3">
            <h5>id cliente:</h5>
          </div>
          <div class="col-md-3">
            <h5>Nombre negocio:</h5>
          </div>
          <div class="col-md-3">
            <h5>Nombre cliente:</h5>
          </div>
        </div>
        <?php foreach ($resultado as $fila) { ?>

          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3">
                <?php echo $fila['id_cliente']; ?>
              </div>
              <div class="col-md-3">
                <?php echo $fila['nombre_negocio']; ?>
              </div>
              <div class="col-md-3">
                <?php echo $fila['nombre_cliente']; ?>
              </div>
              <div class="col-md-3">
                <input type="checkbox" class="form-check-input bt-5" id="Cliente" name="dato" value="" autocomplete="off">
                <label class="form-check-label" for="Cliente">selecciona</label>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
        <br>
        <button type="button" class="btn btn-success">Siguiente</button>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="modal popup" id="detallesVentana">
    <div class="modal-dialog modal-lg modal-dialog-left">
      <div class="modal-content">
        <div class="modal-header">
              <h2 class="fw-bold" style="margin-left: 30px;">Detalles:</h2>
              <button onclick="CerrarDetalles()" type="button" class="btn btn-danger" data-dismiss="modal">x</button>
        </div>
        <div class="row" id="detallesInformacion">
        </div>
      </div>
    </div>
  </div>
</div>
<div>
<script src="controller/javascript/ventasFunciones.js"></script>