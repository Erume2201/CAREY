<?php
#echo "soy tu pagina de Informes Generales" ;
?>
<div class="container">
   <?php
   //Traductor
   $meses = array(
	    1 => 'Enero',
	    2 => 'Febrero',
	    3 => 'Marzo',
	    4 => 'Abril',
	    5 => 'Mayo',
	    6 => 'Junio',
	    7 => 'Julio',
	    8 => 'Agosto',
	    9 => 'Septiembre',
	    10 => 'Octubre',
	    11 => 'Noviembre',
	    12 => 'Diciembre'
	);
    // Obtener el mes y año en el que nos encontramos
    date_default_timezone_set('America/Mexico_City');
    $Years = date('Y');
    $mesNombre = $meses[date('n')];
    $mes = date('n');
    $fechaBd = date('Y-m-d');

    // Función para dividir el mes en semanas, inicio de semana Lunes y fin de la semana Domingo
    function obtenerFechasSemanasEnMes($Years, $mes) {
    		  // arreglo que contendrá las fechas
    		  $fechas = array(); 
	        //arreglos que contendrán las fechas de inicio y fin de cada semana
	        $iniciosDeSemana = array();
	        $finesDeSemana = array();

	        //asignación de un número de semana a cada conjunto de fechas
	        $numeroSemana = 1;

	        //se crea la instancia sin ninguna fecha
	        $fecha = new DateTime();
	        //se establece la fecha del primer día del mes
	        $fecha->setDate($Years, $mes, 1);
	        //obtener el número del primer día del mes (1: lunes, 7: domingo)
	        $primerDiaMes = $fecha->format('N');

	        //obtener la fecha del primer día de la primera semana
	        $fechaInicio = $fecha->format('Y-m-d');
	        //obtiene la fecha formateada como 'Y-m-d'
	        $fechaFin = $fecha->modify('next Sunday')->format('Y-m-d');
	        //almacena las fechas de inicio y fin en los arrays correspondientes
	        $iniciosDeSemana[$numeroSemana] = $fechaInicio;
	        $finesDeSemana[$numeroSemana] = $fechaFin;
	        //incrementa el valor de $numeroSemana para la siguiente semana
	        $numeroSemana++;

	        //avanzar al próximo lunes después del primer día del mes
	        $fecha->modify('next Monday');

	        //obtener las fechas de las semanas restantes
	        while ($fecha->format('n') == $mes) {
	            //obtiene la fecha actual y la asigna a $fechaInicio
	            $fechaInicio = $fecha->format('Y-m-d');
	            //modifica la fecha para que sea el próximo domingo y la asigna a $fechaFin
	            $fechaFin = $fecha->modify('next Sunday')->format('Y-m-d');
	            //almacena las fechas de inicio y fin en los arrays correspondientes
	            $iniciosDeSemana[$numeroSemana] = $fechaInicio;
	            $finesDeSemana[$numeroSemana] = $fechaFin;
	            //incrementa el valor de $numeroSemana para la siguiente semana
	            $numeroSemana++;
	            //modifica la fecha para que sea el próximo lunes
	            $fecha->modify('next Monday');
	        }

	        //devuelve los arrays con las fechas de inicio y fin de cada semana
	        return array($iniciosDeSemana, $finesDeSemana);
	    }

	    //este bloque obtiene las fechas de las semanas en el mes
	    $fechasSemanas = obtenerFechasSemanasEnMes($Years, $mes);
	    $iniciosDeSemana = $fechasSemanas[0];
	    $finesDeSemana = $fechasSemanas[1];

	    //este bloque imprime todas las fechas de inicio y fin de cada semana
	    foreach ($iniciosDeSemana as $numeroSemana => $fechaInicio) {
	        $fechaFin = $finesDeSemana[$numeroSemana];
	        #echo "Semana $numeroSemana: $fechaInicio - $fechaFin<br>";
	    }

	    //Funcion para obtener el primer dia del mes y el ultimo dia del mes
	    function obtenerFechasMes($Years, $mes) {
		    $fechasM = array(); // arreglo que contendrá las fechas

		    // Obtener la primera fecha del mes
		    $fechaInicio = new DateTime();
		    $fechaInicio->setDate($Years, $mes, 1);
		    $fechaInicio = $fechaInicio->format('Y-m-d');

		    // Obtener la última fecha del mes
		    $ultimoDia = date('t', strtotime("$Years-$mes-01")); // obtener el último día del mes
		    $fechaFin = "$Years-$mes-$ultimoDia";

		    $fechasM['inicio'] = $fechaInicio;
		    $fechasM['fin'] = $fechaFin;

		    return $fechasM;
		}

		$fechasMes = obtenerFechasMes($Years, $mes);
		$fechaInicioM = $fechasMes['inicio'];
		$fechaFinM = $fechasMes['fin'];
	?>

   <h2 class="text-center"><?php echo ("Informe General del mes: ".$mesNombre); ?></h2>  
   <h2 class="text-center"><?php echo ("De la fecha: ".$fechaInicioM." Hasta la fecha ".$fechaFinM) ;?></h2>   
   <hr>
   <div class="col-6">
	   <label for="exampleInputPassword1" class="form-label fw-bold">Selecciona el tipo de gráfica que deseas consultar:</label>
	   <div class="form-group password-container">
	   	<div id="copiar"></div>
	     	<div class=" col-9">
	        	<select class="password-field form-select" aria-label="Default select example" name="informe" id="informe">
	        		<option disabled selected hidden>Elige una opción del menú</option>
	        		<option value="Documentos">Gráfica de Semanas con Mayor venta por Documentos</option>
	        		<option value="Usuarios">Gráfica de Semanas con Mayor Venta</option>

	        		<!--option value="usuario">Empleado</option-->
	      	</select>
	      </div>
	      <div class="password-button">
	        <button type="button" class="btn" onclick="verGrafica()" >
	        <img src="assets/image/btnGenerarGrafic.png" width="180" height="50"></button>
	      </div>
	    </div>
    </div>
    <hr>

    <!--Pruebas de fechas-->
    <div class="container text-center col-10">
    	<h4 id="alerta" style="color: red"></h4> 
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
