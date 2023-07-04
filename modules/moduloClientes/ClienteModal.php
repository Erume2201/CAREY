
<!-- Modal para eliminar un cliente-->

<div class="modal fade" id="deleteModal<?php echo $fila['id_cliente']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fw-bold" id="exampleModalLabel">Eliminar</h4>
      </div>
      <form action="modules/moduloClientes/ctrlDeleteCliente.php" method="POST" >
        <div class="modal-body">
          <h4>¿Está seguro de eliminar a <strong><?php echo $fila['nombre_cliente'];?>?</strong></h4>
          <h6>¡Si elimina este cliente se eliminará toda la información relacionado a el!</h6>
          <input type="hidden" class="bt-5" id="datoDelete" name="datoDelete" value="<?php echo $fila['id_cliente']; ?>" autocomplete="off">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Confirmar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!--Modal para modificar un cliente-->

<div class="modal fade" id="editModal<?php echo $fila['id_cliente']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel" style="">Ver/Modicar: <?php echo $fila['nombre_cliente']; ?></h4>
      </div>
      <!--Inicio del formulario para modificar al cliente-->
      <form action="modules/moduloClientes/ctrlEditCliente.php" method="POST" >
        <div class="modal-body">
          <div class="form-group text-start">
            <label for="exampleInputEmail1" class="form-label fw-bold">Nombre:</label>
            <input type="text" class="form-control" name="nombre" placeholder="Ingresa el nombre del cliente" value="<?php echo $fila['nombre_cliente']; ?>">
          </div>
          <br>
          <div class="form-group text-start">
            <label for="exampleInputEmail1" class="form-label fw-bold">Teléfono:</label>
            <input type="text" class="form-control" name="numero" id="numero" placeholder="Ingresa el número de teléfono" maxlength="10" value="<?php echo $fila['telefono_cliente']; ?>">
          </div>
          <br>
          <div class="form-group text-start">
            <label for="exampleInputEmail1" class="form-label fw-bold">Nombre del negocio:</label>
            <input type="text" class="form-control" name="negocio" id="negocio" placeholder="Ingresa el nombre del negocio" value="<?php echo $fila['nombre_negocio']; ?>">
          </div>
          <br>
          <div class="form-group text-start"> 
            <label for="exampleInputEmail1" class="form-label fw-bold">Municipio:</label>
            <input type="text" class="form-control" name="municipio" id="municipio" placeholder="Ingresa el nombre del Municipio" value="<?php echo $fila['municipio']; ?>">
          </div>
          <br>
          <div class="form-group text-start">
              <label class="form-label fw-bold">Estado:</label>
              <br>
              <select class="form-select" aria-label="Default select example" name="estado" id="estado">
                <option disabled selected>Selecciona el Estado</option>
                <option value="Aguas-Calientes">Aguas Calientes</option>
                <option value="Baja-California">Baja California</option>
                <option value="Baja-California-Sur">Baja California Sur</option>
                <option value="Campeche">Campeche</option>
                <option value="Coahuila">Coahuila</option>
                <option value="Colima">Colima</option>
                <option value="Chiapas">Chiapas</option>
                <option value="Chihuahua">Chihuahua</option>
                <option value="DF">Ciudad de México</option>
                <option value="Durango">Durango</option>
                <option value="Guanajuato">Guanajuato</option>
                <option value="Guerrero">Guerrero</option>
                <option value="Hidalgo">Hidalgo</option>
                <option value="Jalisco">Jalisco</option>
                <option value="Estado-Mexico">Estado de México</option>
                <option value="Michoacan">Michoacán</option>
                <option value="Morelos">Morelos</option>
                <option value="Nayarit">Nayarit</option>
                <option value="Nuevo-Leon">Nuevo León</option>
                <option value="Oaxaca">Oaxaca</option>
                <option value="Puebla">Puebla</option>
                <option value="Queretaro">Querétaro</option>
                <option value="QuintanaRoo">Quintana Roo</option>
                <option value="San-Luis">San Luis Potosí</option>
                <option value="Sinaloa">Sinaloa</option>
                <option value="Sonora">Sonora</option>
                <option value="Tabasco">Tabasco</option>
                <option value="Tamaulipas">Tamaulipas</option>
                <option value="Tlaxcala">Tlaxcala</option>
                <option value="Veracruz">Veracruz</option>
                <option value="Yucatan">Yucatán</option>
                <option value="Zacatecas">Zacatecas</option>
              </select>
            </div>
            <br>
            <div class="form-group text-start">
              <label class="form-label fw-bold">País:</label>
              <br>
                <select class="form-select" aria-label="Default select example" name="pais" id="pais">
                  <option disabled selected>Selecciona el País</option>
                  <option value="Mexico">México (predeterminado)</option>
                </select>
            </div>
            <br>
            <input type="hidden" class="bt-5" id="datoEdit" name="datoEdit" value="<?php echo $fila['id_cliente']; ?>" autocomplete="off">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
      </form>
    </div>
  </div>
</div>