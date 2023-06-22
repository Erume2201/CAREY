<?php
session_start();

if (isset($_GET["module"])) {
    if ($_GET["module"] == 'menu') {
        if ($_SERVER["REQUEST_METHOD"] === "POST") { 
            // Verificar si se ha enviado una solicitud POST
            if (isset($_POST["user"]) && isset($_POST["password"])) {
                // Capturar los valores de usuario y contraseña del formulario
                $user_login = $_POST["user"];
                $password_login = md5($_POST["password"]);
                
                // Consulta a la base de datos tomando en cuenta los parámetros ingresados por el usuario
                $SQL = "SELECT usuario, contrasena FROM usuarios WHERE usuario = '$user_login' AND contrasena = '$password_login'";
                $resultado = Consulta($SQL);
                
                if (!empty($resultado)) {
                    $_SESSION['s1'] = $user_login;
                    include_once("view/menu/menu.php"); 
                    include_once("modules/moduloArticulos/Articulos.php");
                } else {
                    ?>
                    <script>alert('¡Credenciales inválidas!')</script>
                    <?php
                    include_once("view/login/login.php");
                }
            } else {
                include_once("view/login/login.php");
            }
        } else {
            include_once("view/login/login.php");
        }
    } else if ($_GET["module"] == 'recuperarContrasena') {
        include_once("view/login/recuperarcontrasena.php");   
    } else if ($_GET["module"] == 'solicitudContrasena') {
        if ($_SERVER["REQUEST_METHOD"] === "POST") { 
            // Verificar si se ha enviado una solicitud POST
            if (isset($_POST["user"])) {
                $user = $_POST["user"];
                // Consulta a la base de datos tomando en cuenta los parámetros ingresados por el usuario
                $SQL = "SELECT * FROM usuarios WHERE correo = '$user'";
                $resultado = Consulta($SQL);
                
                if (!empty($resultado)) {
                    $SQL = "UPDATE usuarios SET estatus_usuario = 'pendiente' WHERE usuario = '$user';";
                    $resultadoUpdate = Actualizar($SQL);
                    
                    if ($resultadoUpdate) {
                        ?>
                        <script>alert('¡Solicitud enviada al administrador correctamente!')</script>
                        <?php
                        include_once("view/login/login.php");
                    } else {
                        ?>
                        <script>alert('¡Este usuario tiene una solicitud pendiente!')</script>
                        <?php
                        include_once("view/login/login.php");
                    }
                } else {
                    echo "<script>alert('¡No se encontró el usuario: " . $user . "');</script>";
                    include_once("view/login/recuperarcontrasena.php");
                }
            } else {
                include_once("view/login/recuperarcontrasena.php");
            }
        } else {
            include_once("view/login/recuperarcontrasena.php");
        }
    } else {
        // Validamos que exista una sesión activa de parte del usuario
        if (isset($_SESSION['s1'])) {
            $option = $_GET["module"];
            
            switch ($option) {
                case 'articulo':
                    include_once("view/menu/menu.php"); 
                    include_once("modules/moduloArticulos/Articulos.php");        
                    break;
                case 'usuario':
                    include_once("view/menu/menu.php"); 
                    include_once("view/menu/menuUsuarios.php");
                    include_once("modules/moduloUsuario/verUsuarios.php");
                    break;
                case 'registraUsuario':
                    include_once("view/menu/menu.php"); 
                    include_once("view/menu/menuUsuarios.php");
                    include_once("modules/moduloUsuario/usuario.php");
                    break;
                case 'configuracion':
                    include_once("view/menu/menu.php");
                    include_once("modules/moduloConfiguracion/configuracion.php");
                    break;
                case 'cerrarSesion':
                    session_destroy();
                    include_once("view/login/login.php");
                    break;
                default:
                    // Acción por defecto
                    break;
            }
        } else {
            ?>
            <script> alert('No existe una sesión iniciada');</script>
            <?php
            include_once("view/login/login.php");
        }
    }
} else {
    include_once("view/login/login.php");
}
?>

