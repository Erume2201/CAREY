<?php

?>
<br>
<br>
<br>
<div class="contenido-do row">
  <div class="col-12">
    <div class="album py-5 bg-body-tertiary">
      <div class="container">
        <div class="alert alert-primary">
          Documentos en venta
        </div>
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
                <form id="<?php echo "FormularioVentas" . $fila['id_articulo_documetos']; ?>" action="" method="">
                  <img class="bd-placeholder-img " src="assets/image/documentos.png" height="100" width="100" style="display: block; margin: 0 auto;">
                  <br>
                  <h4 class="NombreModifica" style="margin-left: 20px;"> <?php echo $fila['nombre']; ?></h4>
                  <!--datos que se deben mostrar cuando se haga click al ver-->
                  <input type="hidden" class="PrecioModifica" value="<?php echo $fila['precio_costo']; ?>">
                  <input type="hidden" class="descripcionModifi" value="<?php echo $fila['descripcion']; ?>">
                  <input type="hidden" class="TipoModifica" value="<?php echo $fila['tipo']; ?>">
                  <input type="hidden" class="idDocumentoElegido" value="<?php echo $fila['id_articulo_documetos']; ?>">

                  <div class="card-body">
                    <label style="margin-left: 8px;">Precio:</label>
                    <label>$</label>
                    <label class="card-text PrecioVModificar" style="margin-left: 0px;"><?php echo $fila['precio_venta']; ?> </label>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <button onclick="detalles()" type="button" class="btn btn-primary btn-detalle" id="<?php echo "bt" . $fila['id_articulo_documetos']; ?> ">Seleccionar</button>
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
</div>

<div class="modal popup" id="popup" role="dialog" aria-labelledby="popupLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="popupLabel">Selecciona un cliente</h5>
        <button onclick="regresarBoton()" type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">regresar</button>
      </div>
      <div class="modal-body">
        <!-- Contenido del modal aquí -->
        <!--class="form-inline"-->
        <?php
        $SQL = "SELECT * FROM cliente";
        $resultado = Consulta($SQL);
        ?>
        <div class="form-group">
          <input type="text" id="search-input" placeholder="Buscar...">
          <button type="" class="btn btn-primary">Buscar</button>
        </div>
        <br>
        <div class="row">
          <div class="col-md-2">
            <h5>id cliente:</h5>
          </div>
          <div class="col-md-2">
            <h5>Nombre negocio:</h5>
          </div>
          <div class="col-md-2">
            <h5>Nombre cliente:</h5>
          </div>
          <div class="col-md-2">
            <h5>Municipio:</h5>
          </div>
        </div>
        <?php foreach ($resultado as $fila) { ?>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-2">
                <?php echo $fila['id_cliente']; ?>
              </div>
              <div class="col-md-2">
                <?php echo $fila['nombre_negocio']; ?>
              </div>
              <div class="col-md-2">
                <?php echo $fila['nombre_cliente']; ?>
              </div>
              <div class="col-md-2">
                <?php echo $fila['municipio']; ?>
              </div>
              <div class="col-md-3">
                <input type="checkbox" class="form-check-input bt-5" id=" <?php echo "Cliente" . $fila['id_cliente']; ?>" name="<?php echo "Cliente" . $fila['id_cliente']; ?>" value="<?php echo $fila['id_cliente']; ?>" autocomplete="off">
                <label class="form-check-label">selecciona</label>
                <input type="hidden" class="nombreNegocio" id="<?php echo "nombreNegocio" . $fila['id_cliente']; ?>" value="<?php echo $fila['nombre_negocio']; ?>">
                <input type="hidden" class="nombreCliente" id="<?php echo "nombreCliente" . $fila['id_cliente']; ?>" value=" <?php echo $fila['nombre_cliente']; ?>">
                <input type="hidden" class="clienteMunicipio" id="<?php echo "clienteMunicipio" . $fila['id_cliente']; ?>" value="<?php echo $fila['municipio']; ?>">
              </div>
            </div>
          </div>
        <?php
        }
        ?>
        <br>
        <button type="button" onclick="CerrarEmergente()" class="btn btn-success">Siguiente</button>
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
        <div class="modal-body">
          <div class="row" id="detallesInformacion">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div>
  <?php
  if (isset($_GET['cliente'])) {
    $status = $_GET['cliente'];
    if ($status == "Nocliente") {
  ?>
      <script>
        window.onload = function() {
          VentanaEmergente();
          localStorage.clear();
        };
      </script>
    <?php
    } else {
    ?>

  <?php
    }
  }
  ?>
</div>
<div>
  <?php
  if (isset($_GET['venta'])) {
    $status = $_GET['venta'];
    if ($status == "Realizada") {
  ?>
      <script>
        Swal.fire('Venta realizada!', '', 'success')
      </script>
    <?php
    } else {
    ?>
      <script>
        Swal.fire({
          icon: 'error',
          title: 'No se pudo realizar la venta',
          text: 'Asista a soporte tecnico!'
        })
      </script>
  <?php
    }
  }
  ?>
</div>
<script src="controller/javascript/ventasFunciones.js"></script>