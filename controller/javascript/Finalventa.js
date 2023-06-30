// en esta parte de codigo utilizamos todos los datos que cargamos al navegador
dia = document.querySelector("#Diaventa");
idDiaventa = document.querySelector("#DiaVentaValor");

hoy = new Date();
dia.textContent = "Fecha: " + hoy.toISOString().split('T')[0];
idDiaventa.value = hoy.toISOString().split('T')[0];

//Hora = document.querySelector("#HoraValor");
//var hora = fechaActual.getHours();
//var minutos = fechaActual.getMinutes();

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
                        <td> <input class="form-control cantidadDoc" type="number" id="Cantidad${localStorage.getItem("idDocumen")}"
                         placeholder="Ingresa cantidad" required></td>
                        <td id="TotalValor${localStorage.getItem("idDocumen")}">0</td>
                    </tr>`;

    tabla.innerHTML = fila;
    localStorage.setItem("FilaHTML", fila);
} else {

    fila += ` <tr class="fila" id="${localStorage.getItem("idDocumen")}">
                        <td>${localStorage.getItem("nombreDocumen")}</td>
                        <td id="PrecioV${localStorage.getItem("idDocumen")}" 
                        class="PrecioV">${localStorage.getItem("PrecioVentaDocument")}</td>

                        <td> <input class="form-control cantidadDoc" type="number" id="Cantidad${localStorage.getItem("idDocumen")}"
                         placeholder="Ingresa un valor" required></td>
                        <td id="TotalValor${localStorage.getItem("idDocumen")}">0</td>
                    </tr>`;

    tabla.innerHTML = fila;
    localStorage.setItem("FilaHTML", fila);
}
let Total=0;
DocumentoCan = document.querySelectorAll(".fila");
DocumentoCan.forEach(DatoP => {
    DatoP.addEventListener("click", event => {
        event.preventDefault();
        let DocumenPrecioElegido = event.currentTarget;
        idPrecio = DocumenPrecioElegido.id;
        precio = DocumenPrecioElegido.querySelector('.PrecioV').innerText;
        TextTotal = document.querySelector("#TotalValor" + idPrecio);
        input = document.querySelector("#Cantidad" + idPrecio);

        input.addEventListener("keyup", () => {
            Subtotal = precio * input.value
            TextTotal.textContent = Subtotal;
            Total=Total+Subtotal;
            ColocarValor = document.querySelector("#TotalFinal");
            ColocarPago = document.querySelector("#TotalPago");
            ColocarPago.textContent = "Pago total:"+Total;
            ColocarValor.value = Total;
        })

    });
});


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
    localStorage.clear();
    FormularioVender    .submit();
}

function cancelarVenta() {
    localStorage.clear();
    window.location.href = "index.php?module=venderDocumento&cliente=Nocliente";

}




