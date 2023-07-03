<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $fila2['id_cliente']; ?>" tabindex="-1" aria-labelledby="exampleModal<?php echo $fila2['id_cliente']; ?>Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModal<?php echo $fila2['id_cliente']; ?>Label" style="">PAGAR CREDITO</h4>
      </div>
      <div class="modal-body">
        <!--Inicio Formulario-->
          <form action="controller/php/controlCreditos/pagarCredito.php" method="POST" >
            <div class="form-group">
            <label for="exampleInputEmail1" class="form-label fw-bold">Id Cliente</label>
              <input type="text" class="form-control" name="idCliente" id="idCliente" placeholder="" value="<?php echo $fila2['id_cliente']; ?>" disabled>
              <label for="exampleInputEmail1" class="form-label fw-bold">Nombre Cliente</label>
              <input type="text" class="form-control" name="nombreCliente" id="nombreCliente" placeholder="" value="<?php echo $fila2['nombre_cliente']; ?>" disabled>
              <!-- variables a enviar idCliente, nombreCliente-->
              <input type="hidden" class="form-control" name="idCliente" id="idCliente" placeholder="" value="<?php echo $fila2['id_cliente']; ?>" >
              <input type="hidden" class="form-control" name="nombreCliente" id="nombreCliente" placeholder="" value="<?php echo $fila2['nombre_cliente']; ?>">
              <!-- termina variable -->
            </div>
            <div class="form-group">
              <br>
              <label for="exampleInputEmail1" class="form-label fw-bold">Numero de telefono</label>
              <input type="text" class="form-control" name="numeroTelefono"  id="numeroTelefono" placeholder="" maxlength="10" oninput="validarNumeros(this)" value="<?php echo $fila2['telefono_cliente']; ?>" disabled>
              <input type="hidden" class="form-control" name="numeroTelefono"  id="numeroTelefono" placeholder="" maxlength="10" oninput="validarNumeros(this)" value="<?php echo $fila2['telefono_cliente']; ?>">
            
            </div>
            <div class="form-group">
              <br>
              <label for="exampleInputEmail1" class="form-label fw-bold">Empresa</label>
              <input type="text" class="form-control" name="empresa" id="empresa" placeholder="" value="<?php echo $fila2['nombre_negocio']; ?>" disabled>
              <input type="hidden" class="form-control" name="empresa" id="empresa" placeholder="" value="<?php echo $fila2['nombre_negocio']; ?>">
            
            </div>
            <div class="form-group">
              <br>
              <label for="exampleInputEmail1" class="form-label fw-bold">Pago total del crédito</label>
              <input type="text" class="form-control" name="totalPago" id="totalPago" placeholder="" value="<?php echo $fila2['total_ventas']; ?>" disabled>
              <input type="hidden" class="form-control" name="totalPago" id="totalPago" placeholder="" value="<?php echo $fila2['total_ventas']; ?>">
            
            <!-- Variables ocultas -->
            <input type="hidden" class="bt-5 form-control" name="fechaInicioConsulta" value="<?php echo $fechaInicio ?>">
            <input type="hidden" class="bt-5 form-control" name="fechaFinConsulta" value="<?php echo $fechaFin ?>" >
            </div>
        <!--Fin Formulario-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Pagar</button>
     </div>
    </form>
    </div>
  </div>
</div>