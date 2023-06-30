// Obtener el ID del cliente al hacer clic en el botón
$(document).on('click', '.btn', function() {
    var idCliente = $(this).closest('tr').find('td:first').text();
  
    // Aquí puedes hacer lo que desees con el ID del cliente
    // Puedes realizar una solicitud AJAX para obtener más información del cliente, por ejemplo
    
    // Imprime el ID del cliente en la consola (puedes cambiar esto por tu lógica personalizada)
    console.log('ID del cliente:', idCliente);
});