<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Obtención de las fechas de corte "DESDE" y "HASTA"
	$fecha_seleccionada = $_POST['fecha_credito'];
    $SQL = "SELECT cli.id_cliente, cli.nombre_cliente, cli.telefono_cliente, cli.nombre_negocio, cre.fecha ,COUNT(cre.id_creditos) AS total_creditos, SUM(cre.total) AS total_ventas
    FROM cliente cli
    LEFT JOIN creditos cre ON cli.id_cliente = cre.cliente_id
    WHERE cre.fecha='$fecha_seleccionada'
    GROUP BY cli.id_cliente, cli.nombre_cliente, cli.telefono_cliente, cli.nombre_negocio;";
    $consultarDatos =Consulta($SQL);
	// Validación de las fechas
	if (empty($consultarDatos)) {
?>
    <script>
    Swal.fire({
    position: 'center',
    icon: 'info',
    title: 'No sé han encontrado creditos en la fecha seleccionada',
    showConfirmButton: false,
    timer: 2000
                        })
    </script>
<?php
		
		//exit;
	} 
	else {
        ?>
        <hr>
        <?php
         echo "<h3><center>$fecha_seleccionada</center></h3>"
        
        ?>
       
        <div class="contenido-do row">
            <br><br>
            <div class="container col-8">
                <table class="table table-hover table-sm table-bordered" id="tabla_principal">
                   <thead class="table-dark text-center">
                    <tr>
                      <th scope="col">Id Cliente</th>
                      <th scope="col">Nombre cliente</th>
                      <th scope="col">Telefono cliente</th>
                      <th scope="col">Nombre negocio</th>
                      <th scope="col">fecha</th>
                      <th scope="col">N° Documentos</th>
                      <th scope="col">Costo Total</th>
                      <th scope="col">Información</th>

                    </tr>
                  </thead>
                  <tbody>
    <!--Aquí haremos que la BD inserte los datos en la tabla-->
    <?php 
    foreach ($consultarDatos as $fila) {                                         
    ?>
        <tr>
            <td><?php echo $fila['id_cliente'];?></td>
            <td><?php echo $fila['nombre_cliente'];?></td>
            <td><?php echo $fila['telefono_cliente'];?></td>
            <td><?php echo $fila['nombre_negocio'];?></td>
            <td><?php echo $fila['fecha'];?></td>
            <td><?php echo $fila['total_creditos'];?></td>
            <td><?php echo $fila['total_ventas'];?></td>
            <td>
                <center>
                <button type="button" class="btn" 
                    data-bs-toggle="modal" data-bs-target="#verDocumentos<?php echo $fila['id_cliente'];?>"
                    style="width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">
                    <img src="assets/image/view.png" width="35" height="35">
                </button>
                </center>
            </td>
        </tr>  
        
        <?php
        //modal verDocumentos
        include("controller/php/controlCreditos/modalCredito.php");
    } 
    ?>      
</tbody>

                </table>
                
            </div>
        </div>
        <!--Termina tabla con datos -->
<?php   
    
	}
    

}
?>