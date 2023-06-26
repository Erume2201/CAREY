//operaciones para el formulario de agregar documento
const text = document.querySelector("#mensaje");
const charCount = document.getElementById('charCount');
const maximoCaracteres = 100;
text.addEventListener("keyup", () => {
    const caracteres = text.value.length;
    charCount.textContent = caracteres + ' / ' + maximoCaracteres + ' caracteres';
    if (caracteres >= maximoCaracteres) {
        text.value = text.value.substring(0, maximoCaracteres); // Trunca el texto al límite máximo de caracteres
        text.blur(); // Retira el enfoque del textarea para que no se pueda seguir escribiendo
    }
})


const titulo = document.querySelector("#TituloFormulario");
var inputNombre = document.getElementById('nombre');
var inputValorcosto = document.getElementById('PrecioCosto');
var inputValorventa = document.getElementById('PrecioVenta');
var inputInformacion = document.getElementById('mensaje');
var inputTipo = document.getElementById('Tipo');
var direccionFormulario = document.getElementById('FormularioPrin');

function VentanaEmergente() {
    document.getElementById('popup').style.display = 'block';
}

function CerrarEmergente() {
    document.getElementById('popup').style.display = 'none';
}
//se despliega el formulario para agregar
function ventanaFormulario(event) {
    event.preventDefault();
    document.getElementById('ventana').style.display = 'block';
}
//se cierra el formulario
function CerrarFormulario() {
    document.getElementById('ventana').style.display = 'none';
    titulo.textContent = "Agregar documento";
    inputNombre.value = "";
    inputValorcosto.value = "";
    inputValorventa.value = "";
    inputInformacion.value = "";
    inputTipo.value = "";
    direccionFormulario.action = "modules/moduloArticulos/InsertarDocumentos.php"
}
//ver detalles del documento probamos a que boton se le da el doble click
var idform = false;
var datodetalle = document.querySelectorAll(".btn-detalle");
datodetalle.forEach(botondetalle => {
    botondetalle.addEventListener("click", event => {
        event.preventDefault();
        const botonpulsado = event.currentTarget;
        var form = botonpulsado.closest('form');
        idform = form.id;
    })
})
//se manda a llamar la funcion de detalle que nos desplegara los datos del documento
function detalles() {
    if (idform != false) {
        var detallesMostrar = document.querySelector("#detallesInformacion");
        var formularioVer = document.querySelector("#" + idform);
        h4 = formularioVer.getElementsByClassName('NombreModifica');
        precioVenta = formularioVer.getElementsByClassName('PrecioVModificar');
        precioCosto = formularioVer.getElementsByClassName('PrecioModifica');
        Descripcion = formularioVer.getElementsByClassName('descripcionModifi');
        tipo = formularioVer.getElementsByClassName('TipoModifica');

        Detallenombre = h4[0].textContent;
        Detallevalorcosto = precioCosto[0].value;
        Detallevalorventa = precioVenta[0].textContent;
        Detalleinformacion = Descripcion[0].value;
        DetalleValorTipo = tipo[0].value;

        var htmlNuevo = `
                        <div class="col-8">
                        <div class="row">
                        <h3 class="p-3 text-primary-emphasis bg-success-subtle border border-primary-subtle rounded-3">${Detallenombre}</h3>
                         </div>
                        <div class="row">  
                        <label>Precio costo:$ ${Detallevalorcosto}</label>
                        </div>
                        <div class="row" >
                        <label>precio venta:$ ${Detallevalorventa}</label>
                        <label>Tipo de documeto:  ${DetalleValorTipo}</label>
                        <label style="font-weight: bold;">Descripcion:</label>
                        <p>${Detalleinformacion}</p>
                        </div>
                        <div class="row">
                        </div>
                        </div>
                        <div class="col-4">
                        <img class="bd-placeholder-img " src="assets/image/documentos.png" height="100" width="100" style="display: block; 
                        margin-top: 30px; margin-left: 60px;">
                        </div>
                        <br>`;

        detallesMostrar.innerHTML += htmlNuevo;
        document.getElementById('detallesVentana').style.display = 'block';

    }

}

function CerrarDetalles() {
    document.getElementById('detallesVentana').style.display = 'none';
    var detallesMostrarBorrar = document.querySelector("#detallesInformacion");
    detallesMostrarBorrar.innerHTML = "";
    idform = false;
}



//operaciones para la eliminacion de documento
//metodo para hacer que solo se pueda selecionar un archivo
const checkboxes = document.querySelectorAll('.bt-5');
marcado = false;
checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', () => {
        if (checkbox.checked) {
            // Desactivar los demás checkboxes
            marcado = checkbox;
            checkboxes.forEach(otherCheckbox => {
                if (otherCheckbox !== checkbox) {
                    otherCheckbox.disabled = true;
                }
            });
        } else {
            // Habilitar los demás checkboxes
            marcado = false;
            checkboxes.forEach(otherCheckbox => {
                if (otherCheckbox !== checkbox) {
                    otherCheckbox.disabled = false;
                }
            });
        }
    });
});

//clave para eliminar un documento
function Eliminar(event) {
    event.preventDefault();
    const formulario = document.querySelector("#FormularioEliminar" + marcado.value);

    if (marcado == false) {
        console.log(marcado);
        Swal.fire('Es necesario marcar un documento para borrar')
    } else {
        Swal.fire({
            icon: 'info',
            title: 'Esta seguro de que quiere eliminar el documentos?',
            showCancelButton: true,
            confirmButtonText: 'borrar',
        }).then((result) => {
            if (result.isConfirmed) {
                formulario.submit();
            } else if (result.isDenied) {

            }
        })
    }
}
//funciones para el boton modificar
function Modificar(event) {
    event.preventDefault();
    if (marcado != false) {
        idDocumento = document.querySelector("#idDocumento");
        formulario = document.querySelector("#FormularioEliminar" + marcado.value);
        h4 = formulario.getElementsByClassName('NombreModifica');
        precioVenta = formulario.getElementsByClassName('PrecioVModificar');
        precioCosto = formulario.getElementsByClassName('PrecioModifica');
        Descripcion = formulario.getElementsByClassName('descripcionModifi');
        tipo = formulario.getElementsByClassName('TipoModifica');

        nombre = h4[0].textContent;
        valorcosto = precioCosto[0].value;
        valorventa = precioVenta[0].textContent;
        informacion = Descripcion[0].value;
        ValorTipo = tipo[0].value;
        titulo.textContent = "Modificar documento";

        inputNombre.value = nombre;
        inputValorcosto.value = valorcosto;
        inputValorventa.value = parseFloat(valorventa);
        inputInformacion.value = informacion;
        inputTipo.value = ValorTipo;
        direccionFormulario.action = "modules/moduloArticulos/ModificarDocumento.php"
        idDocumento.value = marcado.value;

        ventanaFormulario(event)

    } else {
        Swal.fire('Es necesario marcar un documento para modificarlo')
    }

}