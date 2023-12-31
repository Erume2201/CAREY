/**
 * Este metodo permite al usuario buscar y filtrar el contenido de la tabla en tiempo real según el texto 
 * ingresado en un campo de búsqueda. Esto se logra al ocultar las filas de la tabla
 * que no coinciden con el criterio de búsqueda y mostrar solo las filas que sí coinciden. 
 */
(function(document) {
    'buscador';

    var LightTableFilter = (function(Arr) {

      var _input;

      function _onInputEvent(e) {
        _input = e.target;
        var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
        Arr.forEach.call(tables, function(table) {
          Arr.forEach.call(table.tBodies, function(tbody) {
            Arr.forEach.call(tbody.rows, _filter);
          });
        });
      }

      function _filter(row) {
        var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
        row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
      }

      return {
        init: function() {
          var inputs = document.getElementsByClassName('light-table-filter');
          Arr.forEach.call(inputs, function(input) {
            input.oninput = _onInputEvent;
          });
        }
      };
    })(Array.prototype);

    document.addEventListener('readystatechange', function() {
      if (document.readyState === 'complete') {
        LightTableFilter.init();
      }
    });

  })(document);

/**
 * Bloqueo el click del input
 */
const inputElement = document.querySelector('#buscadorBloque');
inputElement.addEventListener('click', function(event) {
  event.preventDefault();
});