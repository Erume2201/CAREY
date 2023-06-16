<?php
    if (isset($_GET["module"])) {  
        # code...
        $option = $_GET["module"];
        switch ($option) {
            case 'menu':
                include_once("view/menu/menu.php");
                break;   
            case 'articulo':
                include("modules/moduloArticulos/Articulos.php");
                break;
            default:
                # code...
                break;
        }
    }else{
       include_once("view/login/login.php");
    }

?>