<?php

?>
<br>
<div class="container">
  <div>
    <?php
    //para mostrar errore de la consulta al servidor
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Incluir el archivo de CRUD.php para poder hacer las consultas
    include_once("controller/php/CRUD.php");
    // Ejecutar el query utilizando la conexión y capturar los resultados
    $query = "SELECT * FROM clientes";
    #$resultados los obtiene el CRUD aqui ya solo tenemos el resultado en un ARRAY
    $resultados = Consulta($query);

    // Trabajar con los resultados
    foreach ($resultados as $fila) {
      echo 'ID: ' . $fila['idclientes'] . ', Nombre: ' . $fila['nombre_cliente'] . '<br>';
    }

    ?>
  </div>
</div>