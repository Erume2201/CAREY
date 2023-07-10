<?php

?>

<div class="container bg-white d-flex justify-content-center align-items-center vh-100">
    <!-- Creamos un formulario de PHP y HTML para enviar los parámetros a través del método GET -->

    <!-- Aquí comienza el formulario index.php?module=menu -->
    <form action="index.php?module=menu" method="POST">
        <div class="bg-dark p-5 rounded-5 text-secondary shadow" style="width: 25rem">
            <div class="d-flex justify-content-center">
                <img src="./assets/image/logo_carey.png" alt="login-icon" style="width: 140%; height: 15rem;" />
            </div>

            <div class="text-center fs-1 fw-bold ">Datos Usuario</div>
            <div class="input-group mt-4">
                <div class="input-group-text bg-info">
                    <img src="https://cdn-icons-png.flaticon.com/512/6073/6073873.png" alt="username-icon"
                        style="height: 2rem" />
                </div>
                <input class="form-control bg-light" type="text" minlength="6" maxlength="16" placeholder="Usuario" name="user" id="user" required />
            </div>

            <!-- Input de contraseña con icono -->
            <div class="input-group mt-1">
                <div class="input-group-text bg-info">
                    <img src="./assets/image/icon-contrasena.png" alt="password-icon" style="height: 2rem" />
                </div>
                <input class="form-control bg-light" type="password" maxlength="8" placeholder="Contraseña" name="password"
                    id="password" required />

                <!-- Icono de mostrar contraseña -->
                <div class="input-group-text">
                    <img onclick="verContrasena()" src="./assets/image/icon/oculto.png" alt="password-icon"
                        style="height: 2rem" id="icon-contrasena" />
                </div>
            </div>

            <!-- Termina input de contraseña con icono -->
            <div class="d-flex justify-content-around mt-1">
                <div class="d-flex align-items-center gap-1">
                </div>
                <div class="pt-1">
                    <a href="index.php?module=recuperarContrasena"
                        class="text-decoration-none text-info fw-semibold fst-italic"
                        style="font-size: 0.9rem">¿Olvidaste tu contraseña?</a>
                </div>
            </div>
            
            <!-- Boton de iniciar sesión -->
            <div>
                <button class="btn btn-info text-white w-100 mt-4 fw-semibold shadow-sm" type="submit"
                    name="validar">Iniciar Sesión</button>
            </div>

            <!-- Termina botón iniciar sesión -->
            <div class="d-flex gap-1 justify-content-center mt-1">
            </div>

    </form>
</div>
<script src="controller/javascript/helperVerContrasena.js"></script>
