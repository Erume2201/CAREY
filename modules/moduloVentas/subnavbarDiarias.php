<br><hr><br>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link disabled" aria-current="page" href="#"><strong>Del día:</strong></a>
        <?php include("modules/moduloVentas/fechaDiaria.php"); ?>
        <form method="POST">
          <input type="date" name="fecha" id="fecha" required>
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
        <input class="form-control me-2" type="search" id ="buscarVentaDiaria" placeholder="Clientes, Fechas, etc" aria-label="Search" autocomplete="off">
      </form>
    </div>
  </div>
</nav>
