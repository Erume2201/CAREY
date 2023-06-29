
function VentanaEmergente() {
    document.getElementById('popup').style.display = 'block';
}
function regresarBoton() {
    window.location.href = "index.php?module=articulo";
}
//operaciones para la selecio de clietes
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

function CerrarEmergente() {
    if (marcado) {
        document.getElementById('popup').style.display = 'none';
        nombreC = document.querySelector("#nombreCliente" + marcado.value);
        nombreN = document.querySelector("#nombreNegocio" + marcado.value);
        MunicipioC = document.querySelector("#clienteMunicipio" + marcado.value);
        //cargamos la informacion al navegador 
        localStorage.setItem("idCliente", marcado.value);
        localStorage.setItem("NombreCliente", nombreC.value);
        localStorage.setItem("NombreNegocio", nombreN.value);
        localStorage.setItem("MunicipioCliente", MunicipioC.value);

        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Cliente seleccionnado',
            showConfirmButton: false,
            timer: 1500
        })
    } else {
        Swal.fire({
            title: 'Es necesario selecionar un cliente',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        })
    }
}

//ver detalles del documento probamos a que boton esta el mause para  colcar el
//id del formulario que vamos a buscar
let idform = false;
let datodetalle = document.querySelectorAll(".btn-detalle");
datodetalle.forEach(botondetalle => {
    botondetalle.addEventListener("mouseenter", event => {
        event.preventDefault();
        let botonpulsado = event.currentTarget;
        let form = botonpulsado.closest('form');
        idform = form.id;
    })
})

//se manda a llamar la funcion de detalle que nos desplegara los datos del documento
function detalles() {
    if (idform != false) {
        let detallesMostrar = document.querySelector("#detallesInformacion");
        let formularioVer = document.querySelector("#" + idform);
        h4 = formularioVer.getElementsByClassName('NombreModifica');
        precioVenta = formularioVer.getElementsByClassName('PrecioVModificar');
        precioCosto = formularioVer.getElementsByClassName('PrecioModifica');
        Descripcion = formularioVer.getElementsByClassName('descripcionModifi');
        tipo = formularioVer.getElementsByClassName('TipoModifica');
        id = formularioVer.getElementsByClassName('idDocumentoElegido');

        Detallenombre = h4[0].textContent;
        Detallevalorcosto = precioCosto[0].value;
        Detallevalorventa = precioVenta[0].textContent;
        Detalleinformacion = Descripcion[0].value;
        DetalleValorTipo = tipo[0].value;
        //cargamos otras variables al navegador
        localStorage.setItem("idDocumen", id[0].value);
        localStorage.setItem("nombreDocumen", Detallenombre);
        localStorage.setItem("PrecioVentaDocument", Detallevalorventa);


        let htmlNuevo = `
                    <div class="col-lg-12">
                       <div class="form">
                           <h4 class="p-3 text-primary-emphasis bg-success-subtle 
                            border border-primary-subtle rounded-3">${Detallenombre}</h4>
                       </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Precio costo: $ ${Detallevalorcosto}</label>
                        </div>
                        <div class="col-md-6">
                            <label>Precio venta: $ ${Detallevalorventa}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <label>Tipo de documento: ${DetalleValorTipo}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <label style="font-weight: bold;">Descripción:</label>
                          <p>${Detalleinformacion}</p>
                        </div>
                    </div>
                   <div class="col-lg-4">
                     <img class="bd-placeholder-img" src="assets/image/documentos.png" height="100" width="100" style="display: 
                      block; margin-top: 30px; margin-left: 60px;">
                    </div>
                   <br>
                   <div class="row">
                   <br>
                   <div class="col-lg-4">
                      <button type="button" onclick="RealizarVenta()" class="btn btn-success">Siguiente</button>
                   </div>
                   </div>
                
                `;

        detallesMostrar.innerHTML += htmlNuevo;
        document.getElementById('detallesVentana').style.display = 'block';
    }
}

function CerrarDetalles() {
    document.getElementById('detallesVentana').style.display = 'none';
    let detallesMostrarBorrar = document.querySelector("#detallesInformacion");
    detallesMostrarBorrar.innerHTML = "";
}

function RealizarVenta() {
    window.location.href = "index.php?module=Realizar";
}



