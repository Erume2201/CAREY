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
      include_once("controller/php/CRUD.php");
      // Ejecutar el query utilizando la conexión y capturar los resultados
      $query = "SELECT * FROM Productos";
      #$resultados los obtiene el CRUD aqui ya solo tenemos el resultado en un ARRAY
      $resultados = Consulta($query);

      // Trabajar con los resultados
      foreach ($resultados as $fila) {
      ?>
        <div class="col">
          <div class="card shadow-sm">
            <img src="assets/image/documentos.png" height="100" width="100">
            <br>
            <h4> <?php echo $fila['codigo_barra'] . " " . $fila['nombre_producto'] ?></h4>

            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Seleccionar</button>
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