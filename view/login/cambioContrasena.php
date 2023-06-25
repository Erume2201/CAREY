<?php

?>

<!-- Formulario de cambio de contraseña
pide 3 parametros contraseña generica, nueva contraseña
confirmar contraseña
-->

<?php

?>


<div class="container bg-white d-flex justify-content-center align-items-center vh-100">
    <!-- Creamos un formulario de PHP y HTML para enviar los parámetros a través del método GET -->

    <!-- Aquí comienza el formulario index.php?module=menu -->
    <form id="myForm" action="" method="POST">
        <div class="bg-dark p-5 rounded-5 text-secondary shadow" style="width: 25rem">
            <div class="d-flex justify-content-center">
                <img src="./assets/image/logo_carey.png" alt="login-icon" style="height: 20rem" />
            </div>

            <div class="text-center fs-1 fw-bold ">NUEVA CONTRASEÑA</div>
            
            <!-- Input de contraseña con icono -->
            <div class="input-group mt-1">
                <div class="input-group-text bg-info">
                    <img src="./assets/image/icon-contrasena.png" alt="password-icon" style="height: 2rem" />
                </div>
                <input class="form-control bg-light" type="password" placeholder="Nueva Contraseña" name="newPass"
                    id="newPass" required />
                <!-- Icono de mostrar contraseña -->
                <div class="input-group-text">
                    <img onclick="newPassWord()" src="./assets/image/icon/oculto.png" alt="password-icon"
                        style="height: 2rem" id="icon-contrasena1" />
                </div>
            </div>
            <!-- Termina input de contraseña con icono -->
            <!-- Input de contraseña con icono -->
            <div class="input-group mt-1">
                <div class="input-group-text bg-info">
                    <img src="./assets/image/icon-contrasena.png" alt="password-icon" style="height: 2rem" />
                </div>
                <input class="form-control bg-light" type="password" placeholder="Confirmar Contraseña"
                    name="confirPassword" id="confirPassword" required />
                <!-- Icono de mostrar contraseña -->
                <div class="input-group-text">
                    <img onclick="confirmarPassWord()" src="./assets/image/icon/oculto.png" alt="password-icon"
                        style="height: 2rem" id="icon-contrasena2" />
                </div>
            </div>
            <!-- Termina input de contraseña con icono -->
            <div>
                <p class="text-success" id="mensajeErrorPass"></p>
            </div>

            <!-- Boton de iniciar sesión disabled-->
            <div>
                <button onclick="validarCamp()" class="btn btn-info text-white w-100 mt-4 fw-semibold shadow-sm"
                    type="submit" id="validar" name="validar" disabled>Iniciar Sesión</button>
            </div>

            <!-- Termina botón iniciar sesión -->
            <div class="d-flex gap-1 justify-content-center mt-1">
            </div>

    </form>
</div>
<script src="controller/javascript/herlperCambioPasswor.js"></script>
