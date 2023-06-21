const text = document.querySelector("#mensaje");
const charCount = document.getElementById('charCount');
const maximoCaracteres = 45; 
text.addEventListener("keyup",()=>{
    const caracteres= text.value.length;
    charCount.textContent = caracteres+ ' / ' + maximoCaracteres + ' caracteres';
    if (caracteres>= maximoCaracteres) {
        text.value = text.value.substring(0, maximoCaracteres); // Trunca el texto al límite máximo de caracteres
        event.preventDefault(); // Evita que se agreguen más caracteres al textarea
        text.blur(); // Retira el enfoque del textarea para que no se pueda seguir escribiendo
      }
})


function VentanaEmergente() {
    document.getElementById('popup').style.display = 'block';
}

function CerrarEmergente() {
    document.getElementById('popup').style.display = 'none';
}


function ventanaFormulario(event) {
    event.preventDefault();
    document.getElementById('ventana').style.display = 'block';
}

function CerrarFormulario() {
    document.getElementById('ventana').style.display = 'none';
}




