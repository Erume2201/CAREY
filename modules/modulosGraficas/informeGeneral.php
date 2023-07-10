<?php
#echo "soy tu pagina de Informes Generales" ;
?>
<div class="container col-10">
   <?php
	   date_default_timezone_set('America/Mexico_City');
	   $dia = date('l Y-m-d');
	   $mesNombre = date('F');
	   $mes = date('n');
	   $Years = date('Y');
	   $fechaBd = date('Y-m-d');

    	function obtenerFechasMes($Years, $mes) {
		    $fechas = array(); // arreglo que contendrá las fechas

		    // Obtener la primera fecha del mes
		    $fechaInicio = new DateTime();
		    $fechaInicio->setDate($Years, $mes, 1);
		    $fechaInicio = $fechaInicio->format('Y-m-d');

		    // Obtener la última fecha del mes
		    $ultimoDia = date('t', strtotime("$Years-$mes-01")); // obtener el último día del mes
		    $fechaFin = "$Years-$mes-$ultimoDia";

		    $fechas['inicio'] = $fechaInicio;
		    $fechas['fin'] = $fechaFin;

		    return $fechas;
		}

		$fechasMes = obtenerFechasMes($Years, $mes);
		$fechaInicio = $fechasMes['inicio'];
		$fechaFin = $fechasMes['fin'];

		#echo "Primera fecha del mes: $fechaInicio<br>";
		#echo "Última fecha del mes: $fechaFin";
    ?>

   <h2 class="text-center"><?php echo ("Informe General del mes: ".$mesNombre); ?></h2>  
   <h2 class="text-center"><?php echo ("De la fecha: ".$fechaInicio." Hasta la fecha ".$fechaFin) ;?></h2>    
   <hr>
   <div class="col-6">
	   <label for="exampleInputPassword1" class="form-label fw-bold">Selecciona el tipo de gráfica que deseas consultar:</label>
	   <div class="form-group password-container">
	   	<div id="copiar"></div>
	     	<div class=" col-9">
	        	<select class="password-field form-select" aria-label="Default select example" name="informe" id="informe">
	        		<option disabled selected hidden>Elige una opción del menú</option>
	        		<option value="Clientes">Gráfica de Clientes con más compras</option>
	        		<option value="Documentos">Gráfica de Documentos Vendidos</option>
	        		<option value="Usuarios">Gráfica de Ventas por Usuarios</option>

	        		<!--option value="usuario">Empleado</option-->
	      	</select>
	      </div>
	      <div class="password-button">
	        <button type="button" class="btn btn-success" onclick="verGrafica()">Generar Gráfica</button>
	      </div>
	    </div>
    </div>
    <hr>
    <div class="container text-center col-10">
    	<h4 id="alerta" style="color: red"></h4> 
    </div>
    <?php
	
    #echo "Primera fecha del mes: $fechaInicio<br>";
	 #echo "Última fecha del mes: $fechaFin";
    ?>

    <div id="graficaClientes" class="contenido-semana" style="width: 1000px; height: 600px; display: none;">Aquí va la gráfica de Clientes <?php echo $fechaInicio ?>
    	
    </div>

    <div id="graficaDocumentos" class="contenido-semana" style="width: 1000px; height: 600px; display: none;">Aquí va la gráfica de Documentos</div>
    
    <div id="graficaUsuarios" class="contenido-semana" style="width: 1000px; height: 600px; display: none;">Aquí va la gráfica de Usuarios</div>

     <?php include("modules/modulosGraficas/graficasDenerales.php"); ?>

    <script>
    	function verGrafica() {
		  const select = document.getElementById("informe");
		  const alerta = document.getElementById("alerta");
		  const divSeleccionado = select.value;

		  //ocultar todos los div de gráficas
		  const graficas = document.getElementsByClassName("contenido-semana");
		  for (var i = 0; i < graficas.length; i++) {
		    graficas[i].style.display = "none";
		  }

		  //mostrar el div correspondiente al valor seleccionado
		  const divMostrar = document.getElementById("grafica" + divSeleccionado);
		  if (divMostrar) {
		    divMostrar.style.display = "block";
		  } else {
		    alerta.textContent = "No has seleccionado ninguna opción disponible.";
		    console.error("El elemento con ID 'grafica" + divSeleccionado + "' no se encontró.");
		  }	

		  //agregar evento de cambio al elemento select
		  select.addEventListener("change", function() {
		    alerta.textContent = ""; //borra el contenido del mensaje
		  });
		}
    </script>
</div>
