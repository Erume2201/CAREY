<?php

?>
<br>
<br>
<br>
<br>
<div class="container">
    <form id="FormularioVenta" action="modules/moduloVentas/MetodoVenta.php"  method="POST">
        <div class="row">
            <div class="col-8">
                <div id="ClienteVentaNombre"> </div>
            </div>
            <div class="col-4">
                <h3 id="Diaventa"></h3>
                <input type="hidden" class="" id="DiaVentaValor" name="DiaVentaValor" value="">
                <input type="hidden" class="" id="horaValor" name="horaValor" value="">
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
                    <h3 id="TotalPago">Pago total:</h3>
                    <input type="hidden" class="" id="TotalFinal" name="TotalFinal" value="">
                </div>
            </div>
            <div class="col-3">
                <button type="button" onclick="AgregarMas()" class="btn btn-primary bt">Agregar Mas.</button>
                <br>
                <label class="form-label">Tipo de Venta:</label>
                <select class="form-control" id="TipoVenta" name="TipoVenta">
                    <option value="Decontado">Decontado</option>
                    <option value="Credito">Credito</option>
                </select>
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
    </form>
</div>
<script src="controller/javascript/Finalventa.js"></script>