<?php

?>
<br>
<br>
<br>
<br>
<div class="container">
    <form id="FormularioVenta" action="modules/moduloVentas/MetodoVenta.php" method="POST">
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
                                <th>Nombre del documento:</th>
                                <th>Precio venta:</th>
                                <th>Cantidad:</th>
                                <th>Total:</th>
                            </tr>
                        </thead>
                        <tbody id="TablaCuerpo">

                        </tbody>
                    </table>
                    <h3 id="TotalPago">Pago total: $0</h3>
                    <input type="hidden" class="" id="TotalFinal" name="TotalFinal" value="">
                </div>
            </div>
            <div class="col-3">
                <button type="button" onclick="AgregarMas()" class="btn btn-primary bt">Agregar más</button>
                <br>
                <label class="form-label">Tipo de Venta:</label>
                <select class="form-control" id="TipoVenta" name="TipoVenta">
                    <option value="Credito">Credito</option>
                    <option value="Decontado">Decontado</option>
                </select>
            </div>
            <div class="col-1">
                <img src="assets/image/salario.png" alt="" width="90px" height="90px" style="display: block; ">
            </div>
        </div>
        <style>
            img:hover {
                transform: scale(1.1);
            }

            .clickable-image {
                cursor: pointer;
            }
        </style>
        <div class="row">
            <div class="col-3">
                <img src="assets/image/botonPagar.png" class="clickable-image" alt="" width="130px" height="45px" onclick="vender(event)">
            </div>

            <div class="col-3">
                <img src="assets/image/btnCancelar.png" class="clickable-image" alt="" width="130px" height="45px" onclick="cancelarVenta()">
            </div>
        </div>
    </form>
</div>

<script src="controller/javascript/Finalventa.js"></script>