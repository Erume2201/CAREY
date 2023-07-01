<?php

?>
<!--data-bs-theme="dark"  -->
<nav class="navbar navbar-expand-lg bg-primary navbar-static fixed-top" >
    <div class="container-fluid">
        <!--etiqueta para separar-->
        <a></a>
        <!--Agregamos el icono al navbar-->
        <img src="./assets/image/logo_carey.png" alt="" width="15%"></img>
        <ul></ul>
        <!--boton de lo responsivo-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


        <!--termina el boton-->
        <!--Comienza el menú principal-->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- inicia el modulo de articulo-->
                <li class="nav-item">
                    <a class="nav-link active fw-bold" href="index.php?module=articulo" id="moduloDocumento">Documentos</a>
                </li>
                <ul></ul>
                <li class="nav-item">
                    <a class="nav-link active fw-bold" href="index.php?module=usuario" aria-expanded="false" 
                    id="usuario">
                        Usuario
                    </a>
                </li>
                <ul></ul>
                <!--Inicia módulo de clientes-->
                <li class="nav-item">
                    <a class="nav-link active fw-bold" aria-current="page" href="index.php?module=clientes" 
                    id="cliente">Clientes</a>
                </li>
                <!--Termina módulo de clientes-->
                <ul></ul>
                <!-- Inicia modulo de ventas -->
                <li class="nav-item dropdown ">
                    <a class="nav-link active dropdown-toggle fw-bold" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false" id="venta">
                        Ventas
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item fw-bold" href="index.php?module=venderDocumento&cliente=Nocliente" 
                        id="venderDocumento">Vender Documentos</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                        <li><a class="dropdown-item fw-bold" href="index.php?module=ventasDiarias" id="ventasDiarias">Ventas diarias</a></li>
                </li>
                <li><a class="dropdown-item fw-bold" href="#" id="ventaSemanal">Ventas Semanales</a>

                </li>
            </ul>
            </li>
            <!--Termina modulo de ventas-->
            <ul></ul>
            <!-- Inicia módulo de créditos -->
            <li class="nav-item">
                <a class="nav-link active fw-bold" aria-current="page" href="index.php?module=creditos" id="creditos">Créditos</a>
            </li>
            <!--Termina módulo de créditos-->
            <ul></ul>
            <!-- modulo de graficas -->
            <li class="nav-item dropdown">
                <a class="nav-link active dropdown-toggle fw-bold" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false" id="grafica">
                    Gráficas
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item fw-bold" href="#" id="reporteSemanal">Reporte semanal</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                    <li><a class="dropdown-item fw-bold" href="#" id="informeGeneral">Informe general</a></li>
            </li>
            </li>
            </ul>
            </li>
            <!--Termina modulo de ventas-->
            <ul></ul>
            <!-- inicia el modulo de configuración-->
            <li class="nav-item">
                <a class="nav-link active fw-bold" aria-current="page" href="index.php?module=configuracion">Configuración</a>
            </li>
            </ul>
<!-- boton de cierre de sesion -->
            <button class="btn btn-warning fw-bold" type="submit" 
            onclick="window.location.href = 'index.php?module=cerrarSesion'">Cerrar Sesión</button>
           

        </div>
    </div>
</nav>


<script src="controller/javascript/helperVerContrasena.js"></script>