<?php

?>
<br>
<div class="row">
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
                    <small class="text-body-secondary">9 mins</small>
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
  <div class="col-3">
    <div class="card shadow-sm">
      <!-- Contenido de la columna estática -->
        <div class="btn-group">
        <button type="button" class="btn btn-success">Agregar</button>
        </div>
    </div>
  </div>
</div>


<div class="modal" id="ventana">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Contenido de la ventana emergente -->
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
<div class="modal">
    <h2 class="form-title">Formulario</h2>
    <form>
      <div class="form-group">
        <label class="form-label" for="name">Nombre:</label>
        <input class="form-input" type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label class="form-label" for="email">Email:</label>
        <input class="form-input" type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label class="form-label" for="message">Mensaje:</label>
        <textarea class="form-input" id="message" name="message" rows="4" required></textarea>
      </div>
      <button class="form-button" type="submit">Enviar</button>
    </form>
  </div>
<script src="controller/javascript/helper.js"></script>