/**
 * Lo siguiente sirve para pasar datos de una tabla al modal
 */

const table = document.getElementById("table");
const modal = document.getElementById("exampleModal");

//obtenermos el id del cliente
table.addEventListener('click', (e)=>{
  e.stopImmediatePropagation();
  var idCliente = e.target.parentElement.parentElement.children[0];
  var idnombre = e.target.parentElement.parentElement.children[1];
  pasarId(idCliente, idnombre);
});

  function pasarId(id, nombre) {
    alert(id + ' ' + nombre);
    $.post('controller/php/controlCreditos/controllerViewCreditos.php',{idCli:id,nomCli:nombre},function(data){
      if (data!=null) {
        alert('datos enviados');
        
      }else{
        alert('datos no enviados');
      }

    })
  console.log(id);
  const idclienteSelec = document.getElementById("idclienteSelec");
  idclienteSelec.innerHTML = parseInt(id);
  const idnombre = document.getElementById("idnombre");
  idnombre.textContent = nombre;
  
}