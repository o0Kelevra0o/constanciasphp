document.addEventListener("DOMContentLoaded", function() {
    // Obtener fecha y hora actual
    var fechaHora = new Date().toLocaleString('es-MX', {day: '2-digit', month: '2-digit', year: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit'});
    document.getElementById("fecha_hora").textContent = fechaHora;

    // Obtener unidades desde la base de datos
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                console.log(this.responseText); // Agrega esta línea para depurar la respuesta
                var unidades = JSON.parse(this.responseText);
                var selectUnidades = document.getElementById("unidad");
                unidades.forEach(function(unidad) {
                    var option = document.createElement("option");
                    option.value = unidad.ID;
                    option.textContent = unidad.nombre;
                    selectUnidades.appendChild(option);
                });
            } else {
                console.error("Error en la solicitud: " + this.status);
            }
        }
    };
    xhr.open("GET", "obtener_unidades.php", true);
    xhr.send();

    // Generar folio
    document.getElementById("generar_folio_btn").addEventListener("click", function() {
        var unidad = document.getElementById("unidad").value;
        var d = new Date();
        var year = d.getFullYear().toString().substr(-2);
        
        // Obtener la tabla correspondiente
        var tabla;
        switch (unidad) {
            case "CU":
                tabla = "Constancias_Cuauhtemoc";
                break;
            case "TA":
                tabla = "Constancias_Tasquena";
                break;
            case "TI":
                tabla = "Constancias_Ticoman";
                break;
            case "ZA":
                tabla = "Constancias_Zaragoza";
                break;
            case "SU":
                tabla = "Constancias_Salauno";
                break;
            case "TH":
                tabla = "Constancias_Theraclinic";
                break;
            case "OL":
                tabla = "Constancias_Olab";
                break;
            case "AZ":
                tabla = "Constancias_Azura";
                break;
            default:
                console.error("Clínica no válida");
                return; // Salir de la función si la clínica no es válida
        }

        // Obtener el consecutivo actualizado
        var xhrConsecutivo = new XMLHttpRequest();
        xhrConsecutivo.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var ultimoConsecutivo = parseInt(this.responseText);
                if (!isNaN(ultimoConsecutivo)) {
                    // Generar folio con el nuevo consecutivo
                    var consecutivo = ("0000" + (ultimoConsecutivo + 1)).slice(-4);
                    var folio = unidad + year + consecutivo; // Ajustar el formato del folio

                    // Mostrar el folio generado
                    document.getElementById("folio_label").textContent = folio;
                } else {
                    console.error("Error al obtener el último consecutivo");
                }
            }
        };
        xhrConsecutivo.open("GET", "conexion.php?accion=obtener_ultimo_consecutivo&tabla=" + tabla, true);
        xhrConsecutivo.send();
    });

    // Habilitar botón guardar al marcar el checkbox
    document.getElementById("checkbox").addEventListener("change", function() {
        document.getElementById("guardar_btn").disabled = !this.checked;
    });

    // Función para guardar datos
    document.getElementById("guardar_btn").addEventListener("click", function() {
        var unidadSeleccionada = document.getElementById("unidad").value;
        var folio = document.getElementById("folio_label").textContent;
        var ape_pat = document.getElementById("ape_pat").value;
        var ape_mat = document.getElementById("ape_mat").value;
        var nombres = document.getElementById("nombres").value;
        var expediente = document.getElementById("expediente").value;
        var hora_llegada = document.getElementById("hora_llegada").value;
        var hora_salida = document.getElementById("hora_salida").value;
        var elaboro = document.getElementById("elaboro").value;
    
        // Determinar la tabla correspondiente
        var tabla;
        switch (unidadSeleccionada) {
            case "CU":
                tabla = "Constancias_Cuauhtemoc";
                break;
            case "TA":
                tabla = "Constancias_Tasquena";
                break;
            case "TI":
                tabla = "Constancias_Ticoman";
                break;
            case "ZA":
                tabla = "Constancias_Zaragoza";
                break;
            case "SU":
                tabla = "Constancias_Salauno";
                break;
            case "TH":
                tabla = "Constancias_Theraclinic";
                break;
            case "OL":
                tabla = "Constancias_Olab";
                break;
            case "AZ":
                tabla = "Constancias_Azura";
                break;
            default:
                console.error("Clínica no válida");
                return; // Salir de la función si la clínica no es válida
        }
    
        // Construir la consulta SQL
        var sql = "INSERT INTO " + tabla + " (Folio, Ape_pat, Ape_Mat, Nombres, Expediente, hora_llegada, hora_salida, Elaboro) " +
                  "VALUES ('" + folio + "', '" + ape_pat + "', '" + ape_mat + "', '" + nombres + "', '" + expediente + "', '" +
                  hora_llegada + "', '" + hora_salida + "', '" + elaboro + "')";
    
        // Realizar la solicitud AJAX para ejecutar la consulta SQL
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState == 4) {
                if (this.status == 200) {
                    console.log("Datos guardados exitosamente en " + tabla);
                    // Mostrar mensaje de confirmación
                    alert("Los datos se guardaron correctamente.");
                    // Mostrar el botón de imprimir después de guardar correctamente
                    document.getElementById("imprimir_btn").style.display = "inline";
                } else {
                    console.error("Error al guardar datos: " + this.responseText);
                    // Mostrar mensaje de error
                    alert("Ocurrió un error al guardar los datos. Por favor, intenta nuevamente.");
                }
            }
        };
        xhr.open("POST", "conexion.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("sql=" + encodeURIComponent(sql));
    });    
});




