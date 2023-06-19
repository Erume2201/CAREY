<?php
    //valido el contenido de la variable GET del login
   # include_once("controller/php/menu_general.php");
    if(isset($_POST['user']) && isset($_POST['password'])){
        //abro el menú
        $user = $_POST['user']; 
        $num2 = $_POST['password'];
        $option = 'menu';
        
        //include("../../../index.php?module=menu");
         
        //include("../menu_general.php?module=menu");
        $x = "menu";
        name1($x);
        
        
        /**
         * Metodo para validar a la bd
         * variables en uso usuario y contraseña
         */
 
    }
?>
    