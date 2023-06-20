<?php

?>
<br>
<div class="album py-5 bg-body-tertiary">
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php
      //para mostrar errore de la consulta al servidor
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);
      // Incluir el archivo de CRUD.php para poder hacer las consultas
      require "controller/php/CRUD.php";
      // Ejecutar el query utilizando la conexión y capturar los resultados
      $query = "SELECT * FROM articulo_documetos";
      #$resultados los obtiene el CRUD aqui ya solo tenemos el resultado en un ARRAY
      $resultados =  Consulta($query);

      // Trabajar con los resultados
      foreach ($resultados as $fila) {
      ?>
        <div class="col">
          <div class="card shadow-sm">
            <img class="bd-placeholder-img rounded-circle" src="assets/image/documentos.png" height="100" width="100">
            <br>
            <h4> <?php echo $fila['nombre'] . " " . $fila['descripcion'] ?></h4>

            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
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
<div class="modal" id="ventana" >
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
<script src="controller/javascript/helper.js"></script>
