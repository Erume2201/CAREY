<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>.:CAREY:.</title>
     <!--Agrege mi estilo-->
    <link rel="stylesheet" type="text/css" href="css/EstilosBoton.css">
    <link rel='stylesheet' type='text/css'
        href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css'>
    <link rel="stylesheet" type="text/css" href="css/CSSUsuarios.css">
    <!--icono en la pestaña-->
    <link rel="icon" href="assets/image/icono_carey.ico" type="image/x-icon">
    <!--Script para el alert-->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   <!-- Responsive -->
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
  


</head>

<body>
    <!--Cargo el archivo de operacion para mandar a llamar LA VISTA LOGIN-->
    <?php
    #agregamos el crud.php para que solo reciba los parametros
    require "controller/php/CRUD.php";
    #iniciamos el menu general
    include_once("controller/php/menu_general.php");
    include_once("modules/moduloConfiguracion/guardarFecha.php");
    
    
    

    

   // include_once("view/menu/menu.php");
    //incluir usuarios
    //include_once("view/usuario/usuario.php");
    ?>

    <script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js">
    </script>
    <!--agregamos el poper y js-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
</body>

</html>