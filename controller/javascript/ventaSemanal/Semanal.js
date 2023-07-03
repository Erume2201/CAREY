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
        opcionesHTML += '<option  value="' + cliente.id + '">' + cliente.value + '</option>';
    });
    seleccion.innerHTML = opcionesHTML; 
}

seleccion.addEventListener('change', function() {
    var selectedValue = seleccion.value;
    // Aquí puedes ejecutar acciones adicionales según la selección del usuario
    cel = document.querySelector("#cel"+selectedValue);
    Numero = document.querySelector("#NumeroCliente");
    Enviar = document.querySelector("#NumeroRecivido");
    Numero.textContent =cel.value;
    Enviar.value = cel.value;
    console.log(cel.value)
});