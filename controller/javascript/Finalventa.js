// en esta parte de codigo utilizamos todos los datos que cargamos al navegador
dia = document.querySelector("#Diaventa");
clientetitulo = document.querySelector("#ClienteVentaNombre");
tabla = document.querySelector("#TablaCuerpo");
hoy = new Date();
dia.textContent = "Fecha: " + hoy.toISOString().split('T')[0];


// Obtener todas las claves almacenadas en localStorage
var claves = Object.keys(localStorage);

// Recorrer todas las claves y obtener los valores asociados
claves.forEach(function (clave) {
    var valor = localStorage.getItem(clave);
    console.log(clave + " " + valor);
});



clientetitulo.innerHTML = `<h3>Cliente: ${localStorage.getItem("NombreCliente")}.</h3>
<h4>Nombre Negocio: ${localStorage.getItem("NombreNegocio")} </h4>`;



let fila = localStorage.getItem("FilaHTML");

if (fila == null) {
    localStorage.setItem("FilaHTML", "");
    fila = ` <tr class="fila" id="fila${localStorage.getItem("idDocumen")}">
                        <td>${localStorage.getItem("nombreDocumen")}</td>
                        <td id="PrecioV" class="PrecioV">${localStorage.getItem("PrecioVentaDocument")}</td>
                        <td> <input class="form-control cantidadDoc" type="number" id="Cantidad${localStorage.getItem("idDocumen")}"
                         placeholder="Ingresa un valor" required></td>
                        <td id="TotalValor${localStorage.getItem("idDocumen")}">0</td>
                    </tr>`;

    tabla.innerHTML = fila;
    localStorage.setItem("FilaHTML", fila);
} else {

    fila += ` <tr class="fila" id="fila${localStorage.getItem("idDocumen")}">
                        <td>${localStorage.getItem("nombreDocumen")}</td>
                        <td id="PrecioV" class="PrecioV">${localStorage.getItem("PrecioVentaDocument")}</td>
                        <td> <input class="form-control cantidadDoc" type="number" id="Cantidad${localStorage.getItem("idDocumen")}"
                         placeholder="Ingresa un valor" required></td>
                        <td id="TotalValor${localStorage.getItem("idDocumen")}">0</td>
                    </tr>`;

    tabla.innerHTML = fila;
    localStorage.setItem("FilaHTML", fila);
}
DocumentoCan = document.querySelectorAll(".fila");

DocumentoCan.forEach(DatoP => {
    DatoP.addEventListener("click", event => {
        event.preventDefault();
        let DocumenPrecioElegido = event.currentTarget;
        precio = DocumenPrecioElegido.querySelector('.PrecioV').innerText;
    });
});


TextTotal = document.querySelector("#TotalValor" + localStorage.getItem("idDocumen"));
input = document.querySelector("#Cantidad" + localStorage.getItem("idDocumen"));

input.addEventListener("keyup", () => {
    Subtotal = precio * input.value
    TextTotal.textContent = Subtotal;
})



function AgregarMas() {
    window.location.href = "index.php?module=venderDocumento&cliente=cliente";
}

//liberamos todo esa memoria utilliza para no sobrecargar datos en almacenamiento
//cargamos otras variables al navegador
localStorage.removeItem("idDocumen");
localStorage.removeItem("nombreDocumen");
localStorage.removeItem("PrecioVentaDocument");

function vender(){
    localStorage.clear();
}

function cancelarVenta(){
    localStorage.clear();
    window.location.href = "index.php?module=venderDocumento&cliente=Nocliente";

}




