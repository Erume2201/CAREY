hoy = new Date();
let enviar = false;
// Configura la zona horaria a México
var opcionesFecha = { timeZone: 'America/Mexico_City' };

var diaActual = hoy.toLocaleDateString('es-MX', opcionesFecha);
var partesFecha = diaActual.split('/');
var fechaFormateada = partesFecha.reverse().join('-');

// en esta parte de codigo utilizamos todos los datos que cargamos al navegador
dia = document.querySelector("#Diaventa");
idDiaventa = document.querySelector("#DiaVentaValor");

Hora = document.querySelector("#horaValor");

dia.textContent = "Fecha: " + fechaFormateada;
idDiaventa.value = fechaFormateada;

// Obtiene la hora actual en México
var horas = hoy.getHours();
var minutos = hoy.getMinutes();
var segundos = hoy.getSeconds();

// Formatear las horas, minutos y segundos con ceros a la izquierda si son menores a 10
horas = horas < 10 ? "0" + horas : horas;
minutos = minutos < 10 ? "0" + minutos : minutos;
segundos = segundos < 10 ? "0" + segundos : segundos;

var horaActual = fechaFormateada + " " + horas + ":" + minutos + ":" + segundos;
Hora.value = horaActual;

/**
 * // Obtener todas las claves almacenadas en localStorage
var claves = Object.keys(localStorage);

// Recorrer todas las claves y obtener los valores asociados
claves.forEach(function (clave) {
    var valor = localStorage.getItem(clave);
    console.log(clave + " " + valor);
});
 */



clientetitulo = document.querySelector("#ClienteVentaNombre");
clientetitulo.innerHTML = `<h3>Cliente: ${localStorage.getItem("NombreCliente")}.</h3>
<h4>Nombre Negocio: ${localStorage.getItem("NombreNegocio")} </h4>
<input type="hidden" class="IDcliente" id="IDcliente" name="IDcliente" value="${localStorage.getItem("idCliente")}">`;


tabla = document.querySelector("#TablaCuerpo");
let fila = localStorage.getItem("FilaHTML");

if (fila == null) {
    localStorage.setItem("FilaHTML", "");
    fila = ` <tr class="fila" id="${localStorage.getItem("idDocumen")}">
                        <td>${localStorage.getItem("nombreDocumen")}</td>
                        <td id="PrecioV" class="PrecioV">${localStorage.getItem("PrecioVentaDocument")}</td>
                        <td> <input class="form-control cantidadDoc" type="text" id="Cantidad${localStorage.getItem("idDocumen")}"
                         placeholder="Ingresa cantidad" required ></td>
                        <td id="TotalValor${localStorage.getItem("idDocumen")}">0</td>
                        <input type="hidden" class="" id="ValorIdDocumen${localStorage.getItem("idDocumen")}" name="ValorIdDocumen[]" 
                        value="${localStorage.getItem("idDocumen")}">
                        <input type="hidden" class="" id="ValorCantidad${localStorage.getItem("idDocumen")}" name="ValorCantidad[]" value="">
                        <input type="hidden" class="SubValor" id="subTotal${localStorage.getItem("idDocumen")}" name="subTotal[]" value="0">
                    </tr>`;

    tabla.innerHTML = fila;
    localStorage.setItem("FilaHTML", fila);
} else {

    fila += ` <tr class="fila" id="${localStorage.getItem("idDocumen")}">
                        <td>${localStorage.getItem("nombreDocumen")}</td>
                        <td id="PrecioV${localStorage.getItem("idDocumen")}" 
                        class="PrecioV">${localStorage.getItem("PrecioVentaDocument")}</td>
                        <td> <input class="form-control cantidadDoc" type="text" id="Cantidad${localStorage.getItem("idDocumen")}"
                         placeholder="Ingresa un valor" required ></td>
                        <td id="TotalValor${localStorage.getItem("idDocumen")}">0</td>
                      <input type="hidden" class="" id="ValorIdDocumen${localStorage.getItem("idDocumen")}" name="ValorIdDocumen[]" 
                        value="${localStorage.getItem("idDocumen")}">
                        <input type="hidden" class="" id="ValorCantidad${localStorage.getItem("idDocumen")}" name="ValorCantidad[]" value="">
                        <input type="hidden" class="SubValor" id="subTotal${localStorage.getItem("idDocumen")}" name="subTotal[]" value="0">
                    </tr>`;

    tabla.innerHTML = fila;
    localStorage.setItem("FilaHTML", fila);
}

DocumentoCan = document.querySelectorAll(".fila");
DocumentoCan.forEach(DatoP => {
    DatoP.addEventListener("click", event => {
        event.preventDefault();
        let DocumenPrecioElegido = event.currentTarget;
        idPrecio = DocumenPrecioElegido.id;
        //obtenemos valores de los campos
        precio = DocumenPrecioElegido.querySelector('.PrecioV').innerText;
        TextTotal = document.querySelector("#TotalValor" + idPrecio);
        input = document.querySelector("#Cantidad" + idPrecio);
        //Colocar valores
        CantidaDocumento = document.querySelector("#ValorCantidad" + idPrecio);
        SubTotalDocumentio = document.querySelector("#subTotal" + idPrecio);

        input.addEventListener("keyup", () => {
            let inputValue = input.value.replace(/\D/g, ''); // Remover todos los caracteres que no sean dígitos
            input.value = inputValue; // Actualizar el valor del campo solo con los dígitos permitidos

            if (inputValue === "") {
                inputValue = "0"; // Si no hay ningún dígito válido, establecer el valor en cero
            }
            Subtotal = precio * input.value;
            CantidaDocumento.value = input.value;
            SubTotalDocumentio.value = Subtotal;
            TextTotal.textContent = "";
            TextTotal.textContent = Subtotal;
            SumaTotal();
            validar();
        })
    });
});
pagos = document.querySelectorAll('.SubValor');
ColocarValor = document.querySelector("#TotalFinal");
ColocarPago = document.querySelector("#TotalPago");
function SumaTotal() {
    let Total = 0;
    pagos.forEach(function (pago) {
        valor = parseFloat(pago.value);
        Total = Total + valor;

    });
    ColocarPago.textContent = "Pago total: $" + Total;
    ColocarValor.value = Total;
}

CamposLlenos = document.querySelectorAll('.cantidadDoc');
function validar() {
    CamposLlenos.forEach(function (campo) {
        if (campo.value == 0) {
            enviar = false;
        } else {
            enviar = true;
        }
    });
}

function AgregarMas() {
    window.location.href = "index.php?module=venderDocumento&cliente=cliente";
}

//liberamos todo esa memoria utilliza para no sobrecargar datos en almacenamiento
//cargamos otras variables al navegador
localStorage.removeItem("idDocumen");
localStorage.removeItem("nombreDocumen");
localStorage.removeItem("PrecioVentaDocument");

FormularioVender = document.querySelector("#FormularioVenta");
function vender() {
    event.preventDefault();
    localStorage.clear();
    if (enviar) {
        FormularioVender.submit();
    }

}

function cancelarVenta() {
    localStorage.clear();
    window.location.href = "index.php?module=venderDocumento&cliente=Nocliente";
}



