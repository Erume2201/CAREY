clientes = document.querySelectorAll('.nombrewhat');
seleccion = document.querySelector("#ClienteWha");
function DatosWhatsApp(){
    document.getElementById('datosWhatsApp').style.display = 'block';
    llenarCamposEnvio() ;

    
}

function CerrarWhatsApp(){
    document.getElementById('datosWhatsApp').style.display = 'none';
}

function llenarCamposEnvio() {
    let opcionesHTML = '<option value=""> Seleciona un cliente</option>';;
    clientes.forEach(function (cliente) {
        console.log(cliente.value);
        opcionesHTML += '<option  value="' + cliente.id + '">' + cliente.value + '</option>';

       
    });
    seleccion.innerHTML = opcionesHTML; 
}

seleccion.addEventListener('change', function() {
    var selectedValue = seleccion.value;
    console.log('El usuario seleccionó: ' + selectedValue);
    // Aquí puedes ejecutar acciones adicionales según la selección del usuario
});