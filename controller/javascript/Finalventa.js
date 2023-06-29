// en esta parte de codigo utilizamos todos los datos que cargamos al navegador
clientetitulo = document.querySelector("#ClienteVentaNombre");
tabla = document.querySelector("#TablaCuerpo");

clientetitulo.innerHTML = `<h3>Cliente: ${localStorage.getItem("NombreCliente")}.</h3>
<h4>Nombre Negocio: ${localStorage.getItem("NombreNegocio")} </h4>`;

tabla. innerHTML = ` <tr class="fila">
                        <td>${localStorage.getItem("nombreDocumen")}</td>
                        <td id="PrecioV" class="PrecioV">${localStorage.getItem("PrecioVentaDocument")}</td>
                        <td> <input class="form-control cantidadDoc" type="number" id="Cantidad${localStorage.getItem("idDocumen")}"
                         placeholder="Ingresa un valor" required></td>
                        <td id="TotalValor${localStorage.getItem("idDocumen")}">0</td>
                    </tr>`;      


DocumentoCan = document.querySelectorAll(".fila");

DocumentoCan.forEach(DatoP => {
    DatoP.addEventListener("click", event => {
      event.preventDefault();
      let DocumenPrecioElegido = event.currentTarget;
        precio = DocumenPrecioElegido.querySelector('.PrecioV').innerText;
    });
});
  

TextTotal = document.querySelector("#TotalValor"+localStorage.getItem("idDocumen"));
input = document.querySelector("#Cantidad"+localStorage.getItem("idDocumen"));

input.addEventListener("keyup", () => {   
    Subtotal = precio*input.value
    TextTotal.textContent = Subtotal;
})
//liberamos todo esa memoria utilliza para no sobrecargar datos en almacenamiento
localStorage.clear();



