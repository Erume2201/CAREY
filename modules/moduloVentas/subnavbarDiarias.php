<br><hr><br>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link disabled" aria-current="page" href="index.php?module=clientes"><strong>Del día:</strong></a>
        <form action="modules/moduloVentas/ventasDiarias.php" method="POST">
          <input type="date" name="fecha" id="fecha">
          <input type="submit" value="Mostrar ventas">
        </form>
      </li>
    </ul>
    <ul></ul>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="d-flex" role="search">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link disabled" aria-current="page" href="#"><strong>Buscar:</strong></a>
          </li>
        </ul>
        <input class="form-control me-2" type="search" id ="buscarNombre" placeholder="Clientes, Informes, etc" aria-label="Search" autocomplete="off">
      </form>
    </div>
  </div>
</nav>
