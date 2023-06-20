<?php
    if (isset($_GET["module"])) {  
        # code...
        $option = $_GET["module"];
        switch ($option) {
            case 'menu':
                $user = "root";
                $password = "password23";
                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    // Verificar si se ha enviado una solicitud POST
                    
                    // Capturar los valores de user y password del formulario
                    $user_login = $_POST["user"];
                    $password_login = $_POST["password"];

                    if ($user == $user_login && $password== $password_login) {
                        include_once("view/menu/menu.php");
                    }else{
                        ?>
                        <script>alert('¡Credenciales invalidas!')</script>";
                        <?php
                        include_once("view/login/login.php");
                    }
                }
                break;   
            case 'articulo':
                include_once("view/menu/menu.php"); 
                include_once("modules/moduloArticulos/Articulos.php");        
                break;
            default:
                # code...
                break;
        }
    }else{
       include_once("view/login/login.php");
    }

?>