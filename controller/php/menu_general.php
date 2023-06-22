<?php
if (isset($_GET["module"])) {
    if ($_GET["module"] == 'menu') {
        if ($_SERVER["REQUEST_METHOD"] === "POST") { 
            /**
             * Verificar si se ha enviado una solicitud POST
             * Capturar los valores de user y password del formulario
             * valores capturados user y password
             * la contraseña ya va hasheada en md5
             */
            $user_login = $_POST["user"];
            $password_login = md5($_POST["password"]);
            
            // Funciones que muestran los errores de consulta en la pantalla
            /*
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            */
            /**
             * Consulta a la base de datos tomando en cuenta los parámetros
             * ingresados por el usuario (nombre de usuario y contraseña)
             */
            $SQL = "SELECT usuario, contrasena FROM usuarios 
            WHERE usuario = '$user_login' 
            AND contrasena = '$password_login'";
            $resultado = Consulta($SQL);
            
            if (!empty($resultado)) {
                session_start();
                $_SESSION['s1'] = $user_login;
                
                include_once("view/menu/menu.php");
            } else {
                ?>
                <script>alert('¡Credenciales inválidas!')</script>
                <?php
                include_once("view/login/login.php");
            }
            
        }
    } else {
        /**
         * Validamos que exista una sesion activa de parte del usuario
         * si existe quiere decir que se logró registrar
         */
        # pregunta si existe una sesion de login 's1'
        session_start();
        if (isset($_SESSION['s1'])) {
            echo "<script>alert('¡HASTA LA PROXIMA: " .  $_SESSION['s1'] . "');</script>";
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
                    include_once("view/login/login.php");
                    session_destroy();
                    break;
                case 'recuperarContrasena':
                    include_once("view/login/recuperarcontrasena.php");
                    break;
                case 'solicitudContrasena':
                    /**
                     * Verificar si se ha enviado una solicitud POST
                     * Capturar los valores de correo electronico
                     * 
                     */
                    if ($_SERVER["REQUEST_METHOD"] === "POST") { 
                        $user = $_POST["user"];
                        /**
                         * Consulta a la base de datos tomando en cuenta los parámetros
                         * ingresados por el usuario (user)
                         */
                        $SQL = "SELECT * FROM usuarios WHERE correo = '$user'";
                        $resultado = Consulta($SQL);
                        #verifica si la variable $resultado no está vacía.
                        if (!empty($resultado)) {
                            $SQL = "UPDATE usuarios SET estatus_usuario = 'pendiente' WHERE usuario = '$user';";
                            
                            $resultadoUpdate = Actualizar($SQL);
                            if($resultadoUpdate){
                                ?>
                                <script>alert('¡Solicitud enviada al administrador correctamente!')</script>
                                <?php
                                include_once("view/login/login.php");
                            }else{
                                ?>
                                <script>alert('¡Este usuario tiene una solicitud pendiente!')</script>
                                <?php
                                include_once("view/login/login.php");
                            }
                        } else {
                            echo "<script>alert('¡No se encontró el usuario: " . $gmail . "');</script>";
                            include_once("view/login/recuperarcontrasena.php");
                        }
                    }
                    break;
                default:
                    # code...
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
