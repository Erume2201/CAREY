<?php

?>
<br>
<br>
<br>
<br>
<div class="contenido-do row">
  <div class="col-9">
    <div class="album py-5 bg-body-tertiary">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <?php
          //para mostrar errore de la consulta al servidor
          ini_set('display_errors', 1);
          ini_set('display_startup_errors', 1);
          error_reporting(E_ALL);

          // Ejecutar el query utilizando la conexión y capturar los resultados
          $query = "SELECT * FROM articulo_documetos";
          $resultados = Consulta($query);
          #$resultados los obtiene el CRUD aqui ya solo tenemos el resultado en un ARRAY
          // Trabajar con los resultados
          foreach ($resultados as $fila) {
          ?>
            <div class="col">
              <div class="card shadow-sm">
                 <!--mandamos el docuemto seleccionado para el borrado o modificado-->
                <form  id="<?php echo "FormularioEliminar".$fila['idarticulo_documetos'];?>" 
                action="modules/moduloArticulos/InsertarDocumentos.php" 
                method="POST">
                <label>
                  <input type="checkbox" class="bt-5" id="dato" 
                   name="dato"
                   value="<?php echo $fila['idarticulo_documetos'];?>" autocomplete="off" >
                  <span class="btn btn-check:checked ">Eliminar &#128465;</span>
                </label>
                </form>
                <img class="bd-placeholder-img " src="assets/image/documentos.png" height="100" width="100" style="display: block; margin: 0 auto;">
                <br>
                <h4> <?php echo $fila['nombre']; ?></h4>

                <div class="card-body">
                  <p class="card-text"> <?php echo $fila['descripcion']; ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button onclick="VentanaEmergente()" type="button" class="btn btn-primary">Seleccionar</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Ver</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-2" style="position: fixed; right: 0;">
    <div class="">
      <!-- Contenido de la columna estática -->
      <div class="buttons">
        <a href="#" class="bt bt-1" onclick="ventanaFormulario(event)">Agregar</a>
        <a href="" class="bt bt-1">Modificar</a>
        <a href="" class="bt bt-1" onclick="Eliminar(event)">Eliminar</a>
      </div>
    </div>
  </div>
  <div class="col-1" style="position: fixed; right: 200px; margin-top: 25px;">
    <img src="assets/image/nuevo-documento.png" alt="" width="80px" height="80px" style="display: block; margin-bottom: 65px;">
    <img src="assets/image/editar.png" alt="" width="80px" height="80px" style="display: block; margin-bottom: 65px;">
    <img src="assets/image/eliminar.png" alt="" width="70px" height="80px">

  </div>
</div>

<div class="popup" id="popup">
  <div class="popup-content">
    <div class="modal-content">
      Contenido de la ventana emergente >
      <div class="modal-header">
        <h5 class="modal-title">Ventana emergente</h5>
        <button onclick="CerrarEmergente()" type="button" class="btn btn-outline-danger" data-dismiss="modal">x</button>
      </div>
      <div class="modal-body">
        <p>Contenido de la ventana emergente...</p>
      </div>
    </div>
  </div>
</div>
<div class="modal" id="ventana">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="row">
        <div class="col-11">
          <h2 class="fw-bold ">Agregar documento</h2>
        </div>
        <div class="col-1">
          <button onclick="CerrarFormulario()" type="button" class="btn btn-outline-danger" data-dismiss="modal">x</button>
        </div>
      </div>
      <div class="row">
        <form action="modules/moduloArticulos/InsertarDocumentos.php" method="POST">
          <div class="form-control">
            <label class="form-label" for="name">Nombre:</label>
            <input class="form-control" type="text" id="name" name="name" required>
            <label class="form-label" for="">Precio:</label>
            <input class="form-control" type="number" id="Precio" name="Precio" required>
            <label class="form-label" for="name">Tipo:</label>
            <input class="form-control" type="text" id="Tipo" name="Tipo" required>
            <label class="form-label" for="">descripcion:</label>
            <br>
            <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
            <small id="charCount" class="form-text text-muted">0 / 45 caracteres</small>
            <br>
            <button class="btn btn-success" type="submit">Enviar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<div>
  <?php
  if (isset($_GET['status'])) {
    $status = $_GET['status'];
    if ($status == "NoInsertado") {
  ?>
      <div>
        <template id="my-template">
          <swal-title>
            ¡Algo salió mal!
          </swal-title>
          <swal-icon type="error" color="red"></swal-icon>
          <swal-button type="confirm">
            Regresar
          </swal-button>
          <swal-param name="allowEscapeKey" value="false" />
          <swal-param name="customClass" value='{ "popup": "my-popup" }' />
          <swal-function-param name="didOpen" value="popup => console.log(popup)" />
        </template>
        <script>
          Swal.fire({
            template: '#my-template'
          });
        </script>
      </div>
    <?php
    } else {
    ?>
      <br>
      <template id="my-template">
        <swal-title>
          ¡Documento insertado!?
        </swal-title>
        <swal-icon type="success" color="greed"></swal-icon>
        <swal-button type="confirm">
          Confirmar.
        </swal-button>
        <swal-param name="allowEscapeKey" value="false" />
        <swal-param name="customClass" value='{ "popup": "my-popup" }' />
        <swal-function-param name="didOpen" value="popup => console.log(popup)" />
      </template>
      <script>
        Swal.fire({
          template: '#my-template'
        });
      </script>
</div>
</div>
<?php
    }
  }
?>
</div>

<script src="controller/javascript/helper.js"></script>