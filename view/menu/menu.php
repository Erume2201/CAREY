<?php

?>
<nav class="navbar navbar-expand-lg bg-body-tertiary navbar-static fixed-top" data-bs-theme="dark">
    <div class="container-fluid">
        <!--etiqueta para separar-->
        <a></a>
        <!--Agregamos el icono al navbar-->
        <img src="./assets/image/logo_carey.png" alt="" width="5.0%"></img>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--Comienza el menú principal-->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- inicia el modulo de articulo-->
                <li class="nav-item">
                    <a class="nav-link" href="index.php?module=articulo">Documentos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="index.php?module=usuario" aria-expanded="false">
                        Usuario
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Clientes</a>
                </li>

                <!--  <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li> -->
                <!-- modulo de ventas -->
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Ventas
                    </a>
                    <ul class="dropdown-menu ">
                        <li><a class="dropdown-item" href="#">Vender Documentos</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                        <li><a class="dropdown-item" href="#">Ventas diarias</a></li>
                </li>
                <li><a class="dropdown-item" href="#">Ventas Semanales</a>

                </li>
            </ul>
            </li>
            <!--Termina modulo de ventas-->
            <!-- modulo de créditos -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Créditos
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">consultar créditos</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                    <li><a class="dropdown-item" href="#">lista de pagos</a></li>
            </li>
            </li>
            </ul>
            </li>
            <!--Termina modulo de ventas-->
            <!-- modulo de graficas -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Gráficas
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Reporte semanal</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                    <li><a class="dropdown-item" href="#">Informe general</a></li>
            </li>
            </li>
            </ul>
            </li>
            <!--Termina modulo de ventas-->
            <!-- inicia el modulo de configuración-->
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php?module=configuracion">Configuración</a>
            </li>
            </ul>
<!-- boton de cierre de sesion -->
            <button class="btn btn-warning" type="submit" 
            onclick="window.location.href = 'index.php?module=cerrarSesion'">Cerrar Sesión</button>
           

        </div>
    </div>
</nav>