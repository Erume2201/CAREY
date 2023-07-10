
/* Esta función es para que al momento de seleccionar un día en DESDE el sistema sea capáz 
   de buscar donde debe finalizar */

        function actualizarHasta() {
            var desde = document.getElementById("desde").value;
            var hasta = document.getElementById("hasta");

            switch(desde) {
                case "Monday":
                    hasta.value = "Sunday";
                    break;
                case "Tuesday":
                    hasta.value = "Monday";
                    break;
                case "Wednesday":
                    hasta.value = "Tuesday";
                    break;
                case "Thursday":
                    hasta.value = "Wednesday";
                    break;
                case "Friday":
                    hasta.value = "Thursday";
                    break;
                case "Saturday":
                    hasta.value = "Friday";
                    break;
                case "Sunday":
                    hasta.value = "Saturday";
                    break;
                default:
                    hasta.value = "";
                    break;
            }
            hasta.disabled = true; // Deshabilitar el campo "Hasta"
        }