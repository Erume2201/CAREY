<?php 
  date_default_timezone_set('America/Mexico_City');
  $fecha = date('Y-m-d');

  if(isset($_POST['fecha'])) {
    $fecha = $_POST['fecha'];
  }
?>
