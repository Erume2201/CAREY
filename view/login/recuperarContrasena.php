<?php

?>

<body>
    <div class="container bg-white d-flex justify-content-center align-items-center vh-100">
        <!--Creamos un formulario de PHP Y HTML PARA MANDAR LOS PARAMETROS
      a traves del metodo GET-->

        <!--Aqui comienza el formulario-->
        <form action="index.php?module=solicitudContrasena" method="POST">
            <div class="bg-dark p-5 rounded-5 text-secondary shadow" style="width: 25rem">
                <div class="d-flex justify-content-center">
                    <img src="./assets/image/logo_carey.png" alt="login-icon" style="width: 140%; height: 15rem;" />
                </div>

                <div class="text-center fs-1 fw-bold">Dato Usuario</div>
                <div class="input-group mt-4">
                    <div class="input-group-text bg-info">
                        <img src="https://cdn-icons-png.flaticon.com/512/6073/6073873.png" alt="username-icon"
                            style="height: 2rem" />
                    </div>
                    <input class="form-control bg-light" type="text" minlength="6" maxlength="16" placeholder="usuario" 
                    name="user" id="user"
                        required />
                </div>


                <div>
                    <button class="btn btn-info text-white w-100 mt-4 fw-semibold shadow-sm" type="submit">Solicitar
                        Cambio de Contraseña</button>
                </div>
                
                <div>
                    <button class="btn btn-warning text-white w-100 mt-4 fw-semibold shadow-sm" type="submit" 
                        onclick="window.location.href = 'index.php'">Cancelar</button>
                </div>
                <div class="d-flex gap-1 justify-content-center mt-1">
                </div>

        </form>
    </div>
</body>