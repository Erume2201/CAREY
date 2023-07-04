
        // Obtener los valores seleccionados en los elementos de formulario y procesarlos
        function guardarConfiguracion() {
            var desde = document.getElementById("desde").value;
            var hasta = document.getElementById("hasta").value;

            // Realizar la transformación de las fechas
            var fechaActual = new Date(); // Obtener la fecha actual
            var diaActual = fechaActual.getDay(); // Obtener el día de la semana actual (0-6)

            // Cálculo de las fechas de inicio y fin en función de los días seleccionados
            var fecha_inicio, fecha_fin;
            if (desde === diaActual.toString()) {
                fecha_inicio = fechaActual.toISOString().slice(0, 10); // Formato YYYY-MM-DD
            } else {
                var diasAtras = (diaActual - desde + 7) % 7; // Número de días hacia atrás para llegar al día seleccionado
                fecha_inicio = new Date(fechaActual.getTime() - (diasAtras * 24 * 60 * 60 * 1000)).toISOString().slice(0, 10);
            }
            var diasAdelante = (hasta - desde + 7) % 7; // Número de días hacia adelante para llegar al día seleccionado
            fecha_fin = new Date(fechaActual.getTime() + (diasAdelante * 24 * 60 * 60 * 1000)).toISOString().slice(0, 10);

            // Verificar la diferencia entre las fechas DESDE y HASTA
            var diferencia_dias = (new Date(fecha_fin) - new Date(fecha_inicio)) / (24 * 60 * 60 * 1000);
            if (diferencia_dias !== 6) {
                alert("La diferencia de días entre las fechas DESDE y HASTA debe ser de 7 días calendario.");
                return;
            }

            // Almacenar los valores transformados en el Local Storage
            localStorage.setItem("desde", fecha_inicio);
            localStorage.setItem("hasta", fecha_fin);

            // Mostrar un mensaje de éxito
            alert("La configuración se ha guardado correctamente.");
        }