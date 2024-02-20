document.addEventListener("DOMContentLoaded", function() {
    // Obtener fecha y hora actual
    var fechaHora = new Date().toLocaleString('es-MX', {day: '2-digit', month: '2-digit', year: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit'});
    document.getElementById("fecha_hora").textContent = fechaHora;

    // Obtener unidades desde la base de datos
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var unidades = JSON.parse(this.responseText);
            var selectUnidades = document.getElementById("unidad");
            unidades.forEach(function(unidad) {
                var option = document.createElement("option");
                option.value = unidad.ID;
                option.textContent = unidad.nombre;
                selectUnidades.appendChild(option);
            });
        }
    };
    xhr.open("GET", "obtener_unidades.php", true);
    xhr.send();

    // Generar folio
    document.getElementById("generar_folio_btn").addEventListener("click", function() {
        var unidad = document.getElementById("unidad").value;
        var d = new Date();
        var year = d.getFullYear().toString().substr(-2);
        var folio = unidad + year + "0000"; // Reemplaza "0000" con el consecutivo obtenido de la base de datos
        document.getElementById("folio_label").textContent = folio;
    });

    // Habilitar botón guardar al marcar el checkbox
    document.getElementById("checkbox").addEventListener("change", function() {
        document.getElementById("guardar_btn").disabled = !this.checked;
    });

    // Función para guardar datos
    document.getElementById("guardar_btn").addEventListener("click", function() {
        // Aquí puedes agregar la lógica para guardar los datos en la base de datos
        // Después de guardar correctamente, muestra el botón de imprimir
        document.getElementById("imprimir_btn").style.display = "inline";
    });
});
