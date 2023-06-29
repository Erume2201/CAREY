<?php



?>
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-8">
             <div id="ClienteVentaNombre"> </div>
        </div>
        <div class="col-4">
            <h3 id="Diaventa"></h3>
        </div>

    </div>
    <br>
    <div class="row">
        <div class="col-8">
            <div class="table-responsive">
                <table class="table table-bordered" id="InformacionVenta">
                    <thead>
                        <tr>
                            <th>Nombre documento:</th>
                            <th>Precio venta documento:</th>
                            <th>cantidad Documento:</th>
                            <th>Total:</th>
                        </tr>
                    </thead>
                    <tbody id="TablaCuerpo">
                       
                    </tbody>
                </table>
                <p>$344</p>
            </div>
        </div>
        <div class="col-3">
         <button type="button" onclick="AgregarMas()" class="btn btn-primary bt">Agregar Mas.</button>
        </div>
        <div class="col-1">
        <img src="assets/image/salario.png" alt="" width="90px" height="90px" style="display: block; ">
        </div>
    </div>
    <div class="row">
        <div class="col-3">
        <button type="button" onclick="vender()" class="btn btn-success bt">Finalizar</button>
        </div>
        <div class="col-3">
        <button type="button" onclick="cancelarVenta()" class="btn btn-danger bt">Cancelar</button>
        </div>
      </div>
</div>
<script src="controller/javascript/Finalventa.js"></script>