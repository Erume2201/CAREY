<?php



?>
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-12">
             <div id="ClienteVentaNombre"> </div>
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
        <div class="col-2">
         <div class="row">
         <button type="button" class="btn btn-primary bt">Agregar Mas.</button>
         </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
        <button type="button" class="btn btn-success bt">Finalizar</button>
        </div>
        <div class="col-3">
        <button type="button" class="btn btn-danger bt">Cancelar</button>
        </div>
      </div>
</div>
<script src="controller/javascript/Finalventa.js"></script>