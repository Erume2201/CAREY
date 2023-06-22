<?php

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>.:LOGIN CAREY:.</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

</head>

<body>
    <div class="container bg-white d-flex justify-content-center align-items-center vh-100">
        <!--Creamos un formulario de PHP Y HTML PARA MANDAR LOS PARAMETROS
      a traves del metodo GET-->

        <!--Aqui comienza el formulario index.php?module=menu-->
        <form action="index.php?module=menu" method="POST">
            <div class="bg-dark p-5 rounded-5 text-secondary shadow" style="width: 25rem">
                <div class="d-flex justify-content-center">
                    <img src="./assets/image/logo_carey.png" alt="login-icon" style="height: 20rem" />
                </div>

                <div class="text-center fs-1 fw-bold">Datos Usuario</div>
                <div class="input-group mt-4">
                    <div class="input-group-text bg-info">
                        <img src="https://cdn-icons-png.flaticon.com/512/6073/6073873.png" alt="username-icon"
                            style="height: 2rem" />
                    </div>
                    <input class="form-control bg-light" type="text" placeholder="   
            Usuario" name="user" id="user" required />
                </div>
                <!-- input de contraseña con icono -->
                <div class="input-group mt-1">
                    <div class="input-group-text bg-info">
                        <img src="./assets/image/icon-contrasena.png" alt="password-icon" style="height: 2rem" />
                    </div>
                    <input class="form-control bg-light" type="password" placeholder="            Contraseña" 
                    name="password"
                        id="password" required />
                        <!--icono de mostrar contraseña-->
                        <div class="input-group-text">
                        <img src="./assets/image/icon-contrasena.png" alt="password-icon" style="height: 2rem"
                         name="icon-contrasena"/>
                    </div>
                </div>
                 <!-- termina input de contraseña con icono -->
                <div class="d-flex justify-content-around mt-1">
                    <div class="d-flex align-items-center gap-1">
                    </div>
                    <div class="pt-1">
                        <a href="index.php?module=recuperarContrasena"
                            class="text-decoration-none text-info fw-semibold fst-italic"
                            style="font-size: 0.9rem">¿Olvidaste tu contraseña?</a>
                    </div>
                </div>
               <!--boton de iniciar sesion -->
                <div>
                    <button class="btn btn-info text-white w-100 mt-4 fw-semibold shadow-sm" type="submit"
                        name="validar">Iniciar Sesión</button>
                </div>

                <!-- termina boton iniciar sesion-->
                <div class="d-flex gap-1 justify-content-center mt-1">
                </div>

        </form>
    </div>
</body>

</html>