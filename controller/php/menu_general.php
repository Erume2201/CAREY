<?php
session_start();

if (isset($_GET["module"])) {
    if ($_GET["module"] == 'menu') {
        /**
         * Aquí iniciamos con la validacion del metodo POST si existe o no
         * si existe entrará al modulo principal
         */
        if ($_SERVER["REQUEST_METHOD"] === "POST") { 
            // Verificar los datos que se ha enviado una solicitud POST user y password se validen
            if (isset($_POST["user"]) && isset($_POST["password"])) {
                // Capturar los valores de usuario y contraseña del formulario
                $user_login = $_POST["user"];
                $password_login = md5($_POST["password"]);
                
                // Consulta a la base de datos tomando en cuenta los parámetros ingresados por el usuario
                $SQL = "SELECT id_usuarios, nombre_usuario, contrasena, rol_usuario 
                FROM usuarios WHERE nombre_usuario = '$user_login' AND contrasena = '$password_login'";
                $resultado = Consulta($SQL);
                /**
                 * Si el usuario y contraseña son correctos en la db
                 * iniciamos sesion.
                 */
                if (!empty($resultado)) {
                    $_SESSION['s1'] = $user_login;
                    $_SESSION['id_user'] = $resultado[0]['id_usuarios'];
                    $_SESSION['rol_usuario'] = $resultado[0]['rol_usuario'];
                   
                    /**
                     * a continuacion realizamos una busqueda si el usuario que inicio sesion
                     * tiene una contraseña generica o no, si es generica abre el cambio
                     * de contraseña si no entra al menú
                     */
                    $SQL = "SELECT nombre_usuario, estatus_usuarios 
                    FROM usuarios 
                    WHERE nombre_usuario = '$user_login' AND estatus_usuarios = 'generica'";
                    $resultado = Consulta($SQL);
                    if (!empty($resultado)) {
                        include_once("view/login/cambioContrasena.php");
                        ?>
                        <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'info',
                            title: 'Tienes un cambio de contraseña pendiente',
                            showConfirmButton: false,
                            timer: 2500
                        })
                        </script>

<?php
                        exit();
                    }else{
                      #  $idusuarionuevo = $_SESSION['id_user'];
                     #   $rolusuarionuevo = $_SESSION['rol_usuario'];
                     #   echo "<script>alert('hola " . $idusuarionuevo . $rolusuarionuevo . "');</script>";
                        

                     echo "<script>window.location = 'index.php?module=configuracion'</script>";
                     
                    } //termina la validacion de la contraseña generica
                 //comienza el else de si las contraseña y usuario ingresados no estan el la db                           
                } else {
                    ?>
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Credenciales invalidas!'
                })
                </script>
<?php
                    include_once("view/login/login.php");
                }
                //termina el else de si las contraseña y usuario ingresados no estan el la db  
                // y retorna al login para iniciar sesion 
            } else {
                include_once("view/login/login.php");
            }// termina la verificar los datos que se ha enviado una solicitud POST user y password se validen
            
        } else {
            include_once("view/login/login.php");
        } // termina la verificar los datos post si no existe nada
        /**
         * el siguiente elsi if abre la vista de recuperar contraseña
         * en caso de ser llamada donde el usuario solo ingresa su nueva contraseña
         * y confirma la misma.
         */
    } else if ($_GET["module"] == 'recuperarContrasena') {
        include_once("view/login/recuperarcontrasena.php");  
        /**
         * la siguiente condicion sirve para abrir la pagina solicitudContrasena
         * donde se le pide al usuario ingresar su usuario solamente
         */ 
    } else if ($_GET["module"] == 'solicitudContrasena') {
        if ($_SERVER["REQUEST_METHOD"] === "POST") { 
            // Verificar si se ha enviado una solicitud POST
            if (isset($_POST["user"])) {
                $user = $_POST["user"];
                // Consulta a la base de datos tomando en cuenta los parámetros ingresados por el usuario
                $SQL = "SELECT * FROM usuarios WHERE nombre_usuario = '$user'";
                $resultado = Consulta($SQL);
                
                if (!empty($resultado)) {
                    $SQL = "UPDATE usuarios SET estatus_usuarios = 'pendiente' WHERE nombre_usuario = '$user';";
                    $resultadoUpdate = Actualizar($SQL);
                    if ($resultadoUpdate) {
                        ?>
                        <script>
                            Swal.fire({
                            icon: 'info',
                            title: '¡Solicitud enviada correctamente!',
                            text: 'Un administrador enviará su nueva contraseña'
                            })
                        </script>
<?php
                        include_once("view/login/login.php");
                    } else {
                        ?>
                        <script>
                            Swal.fire({
                            icon: 'info',
                            title: 'Solicitud pendiente',
                            text: 'Este usuario ya hizo una solicitud!',
                            })
                        </script>
<?php
                        include_once("view/login/login.php");
                    }
                } else {
                    ?>
                    <script>
                    Swal.fire({
                    icon: 'error',
                    title: 'No se encontró el usuario: <?php echo $user;?>.',
                    text: 'Ingrese un usuario correcto!',
                    })
                </script>
                <?php
                    
                    include_once("view/login/recuperarcontrasena.php");
                }
            } else {
                include_once("view/login/recuperarcontrasena.php");
            }
        } else {
            include_once("view/login/recuperarcontrasena.php");
        }
    //termina solicitud contraseña
    /**
     * el siguiente else entra solo si existe una sesion activa
     * es decir si el usuario se ha logeado es quien da acceso 
     * a los modulos.
     */
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
                    if ( $_SESSION['rol_usuario'] == 'usuario') {
                        ?>
                            <script>
                            Swal.fire({
                            icon: 'info',
                            title: 'Acceso denegado',
                            text: '¡Usted no es administrador!',
                            })
                        </script>   
                <?php
                include_once("view/menu/menu.php"); 
                include_once("modules/moduloArticulos/Articulos.php");
                    }else{
                    include_once("view/menu/menu.php"); 
                    include_once("view/menu/menuUsuarios.php");
                    include_once("modules/moduloUsuario/verUsuarios.php");
                }
                    break;
                case 'registraUsuario':
                    include_once("view/menu/menu.php"); 
                    include_once("view/menu/menuUsuarios.php");
                    include_once("modules/moduloUsuario/usuario.php");
                    break;
                case 'recuperarUserPass':
                    include_once("view/menu/menu.php"); 
                    include_once("view/menu/menuUsuarios.php");
                    include_once("modules/moduloUsuario/recuperarPassU.php");
                    break;
                case 'clientes':
                    if ( $_SESSION['rol_usuario'] == 'usuario') {
                        ?>
                            <script>
                            Swal.fire({
                            icon: 'info',
                            title: 'Acceso limitado',
                            text: '¡Usted solo tiene acceso a registrar usuarios!',
                            })
                        </script>   
                <?php
                include_once("view/menu/menu.php"); 
                include_once("modules/moduloClientes/subnavbarClientes.php");
                    }else{
                    include_once("view/menu/menu.php");
                    include_once("modules/moduloClientes/subnavbarClientes.php");
                    include_once("modules/moduloClientes/clientes.php");
                    }
                    break;
                case 'nuevoCliente':
                    include_once("view/menu/menu.php");
                    include_once("modules/moduloClientes/subnavbarClientes2.php");
                    include_once("modules/moduloClientes/nuevoCliente.php");
                    break;
                case 'creditos':
                    include_once("view/menu/menu.php");
                    include_once("modules/moduloCreditos/subnavbarCreditos.php");
                    include_once("modules/moduloCreditos/creditos.php");
                    break;
                case 'reporteSemanal':
                    if ( $_SESSION['rol_usuario'] == 'usuario') {
                        ?>
                            <script>
                            Swal.fire({
                            icon: 'info',
                            title: 'Acceso denegado',
                            text: '¡Usted no es administrador!',
                            })
                        </script>   
                <?php
                include_once("view/menu/menu.php"); 
                include_once("modules/moduloArticulos/Articulos.php");
                    }else{
                    include_once("view/menu/menu.php");
                    include_once("modules/modulosGraficas/subMenuGraficas.php");
                    include_once("modules/modulosGraficas/reporteSemanal.php");
                    }
                    break;
                case 'informeGeneral':
                    if ( $_SESSION['rol_usuario'] == 'usuario') {
                        ?>
                            <script>
                            Swal.fire({
                            icon: 'info',
                            title: 'Acceso denegado',
                            text: '¡Usted no es administrador!',
                            })
                        </script>   
                <?php
                include_once("view/menu/menu.php"); 
                include_once("modules/moduloArticulos/Articulos.php");
                    }else{
                    include_once("view/menu/menu.php");
                    include_once("modules/modulosGraficas/subMenuGraficas.php");
                    include_once("modules/modulosGraficas/informeGeneral.php");
                    }
                    break;
                case 'historialCreditos':
                    include_once("view/menu/menu.php");
                    include_once("modules/moduloCreditos/subnavbarCreditos.php");
                    include_once("modules/moduloCreditos/historial.php");
                    break;
                case 'configuracion':
                    if ( $_SESSION['rol_usuario'] == 'usuario') {
                        ?>
                            <script>
                            Swal.fire({
                            icon: 'info',
                            title: 'Acceso denegado',
                            text: '¡Usted no es administrador!',
                            })
                        </script>   
                <?php
                include_once("view/menu/menu.php");
                include_once("modules/moduloArticulos/Articulos.php"); 
                    }else{
                    include_once("view/menu/menu.php");
                    include_once("modules/moduloConfiguracion/configuracion.php");
                }
                    break;
                case 'cerrarSesion':
                    session_destroy();
                    include_once("view/login/login.php");
                    break;
                case 'venderDocumento':
                    include_once("view/menu/menu.php");
                    include_once("modules/moduloVentas/ventas.php");
                    break;
                case 'Realizar':
                    include_once("view/menu/menu.php");
                    include_once("modules/moduloVentas/RealizarVenta.php");
                    break;        
                case 'ventasDiarias':
                    if ( $_SESSION['rol_usuario'] == 'usuario') {
                        ?>
                            <script>
                            Swal.fire({
                            icon: 'info',
                            title: 'Acceso denegado',
                            text: '¡Usted no es administrador!',
                            })
                        </script>   
                <?php
                include_once("view/menu/menu.php");
                include_once("modules/moduloArticulos/Articulos.php"); 
                    }else{
                    include_once("view/menu/menu.php");
                    include_once("modules/moduloVentas/subnavbarDiarias.php");
                    include_once("modules/moduloVentas/ventasDiarias.php");
                    }
                    break;
                case 'ventaSemanal':
                    if ( $_SESSION['rol_usuario'] == 'usuario') {
                        ?>
                            <script>
                            Swal.fire({
                            icon: 'info',
                            title: 'Acceso denegado',
                            text: '¡Usted no es administrador!',
                            })
                        </script>   
                <?php
                include_once("view/menu/menu.php"); 
                include_once("modules/moduloArticulos/Articulos.php");
                    }else{
                     include_once("view/menu/menu.php");
                     include_once("modules/moduloVentas/ventaSemanales.php");
                    }
                     break;
                case 'errorCambioPassword':
                    include_once("view/login/cambioContrasena.php");
                    ?>
                    <script>
                        Swal.fire({
                        icon: 'error',
                        title: 'Contraseñas',
                        text: 'Verifica que tus contraseñas coincidan!'
                        })
                    </script>

                    <?php
                        break;
                case 'cambioPassword':
                        if ($_SERVER["REQUEST_METHOD"] === "POST") { 
                            // Verificar si se ha enviado una solicitud POST
                            if (isset($_POST["passActual"]) && isset($_POST["newPass"])) {
                                // Capturar los valores de usuario y contraseña del formulario
                                $passwordActual =md5($_POST["passActual"]);
                                $newpassword = md5($_POST["newPass"]);
                                $datoUsuario =$_SESSION['s1'];
                                $SQL = "SELECT nombre_usuario, contrasena FROM usuarios 
                                WHERE nombre_usuario = '$datoUsuario' AND contrasena = '$passwordActual'";
                                $resultado = Consulta($SQL);
                                /**
                                 * Si el usuario y contraseña son correctos en la db
                                 * iniciamos sesion.
                                 */
                                if (!empty($resultado)) {
                                $SQL = "UPDATE usuarios 
                                SET estatus_usuarios = 'activo', contrasena='$newpassword' 
                                WHERE nombre_usuario = '$datoUsuario';";
                                $resultado = Actualizar($SQL);
                                if($resultado){
                                    include_once("view/menu/menu.php"); 
                                    include_once("modules/moduloArticulos/Articulos.php");
                                }else{
                                    ?>
                                <script>
                                Swal.fire({
                                icon: 'error',
                                title: 'No se pudo actualizar la contraseña'
                                })
                            </script>
<?php
                                    include_once("view/login/login.php");

                                }
                                //termina si encuentra el usuario y actual contraseña
                            }else{
                                include_once("view/login/cambioContrasena.php");
                                ?>
                                <script>
                                Swal.fire({
                                icon: 'error',
                                title: 'No se pudo actualizar la contraseña',
                                text: 'Contraseña actual incorrecta'
                                })
                            </script>
<?php
                                                              }
                        }
                        }
                        break;  
                default:
                    // Acción por defecto
                    break;
            }
        } else {
            ?>
        <script>
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: 'No existe una sesion iniciada',
                showConfirmButton: true,
                timer: 2500
            })
        </script>
<?php
            include_once("view/login/login.php");
        }
    }
} else {
    include_once("view/login/login.php");
}
?>