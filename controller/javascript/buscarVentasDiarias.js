
// Esta función es para buscar datos de las ventas diarias en el buscador.

function buscarVentas() {
    //  Obtenemos el valor de del campo de búsqueda y lo convertimos a minúsculas
    var searchValue = document.getElementById('buscarVentaDiaria').value.toLowerCase();
    // Agregamos un ID  a la tabla para poder obtener su referencia
    var tabla = document.getElementById('tablaVentasDiarias');
    // Obtenemos todos los datos de las filas de la tabla VENTAS DIARIAS
    var filas = tabla.getElementsByTagName('tr');

    // Esta bucle lo usaremos para recorrer todas las filas
    for (var i = 0; i < filas.length; i++) {
      // Obtenmos todas las celdas de la fila actual
      var celdas = filas[i].getElementsByTagName('td');
      var match = false;

      for (var j = 0; j < celdas.length; j++) {
        // Obtenemos el texto de la fila actual y lo convertimos a minúsculas
        var textoCelda = celdas[j].textContent.toLowerCase();
        // Verificamos si el valor de de búsqueda se encuentra dentro dentro del texto de la celda
        if (textoCelda.includes(searchValue)) {
          match = true;
          break;
        }
      }

      if (match) {
        filas[i].style.display = '';
      } else {
        filas[i].style.display = 'none';
      }
    }
  }

  document.getElementById('buscarVentaDiaria').addEventListener('input', buscarVentas);