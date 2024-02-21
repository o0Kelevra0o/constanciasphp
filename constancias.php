<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Constancias Médicas</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</head>

<body>

    <section class="formulario">
        <div class="tiempo"><label id="fecha_hora"></label><br><br>
        </div>
        <div class="campo"><label for="unidad">Unidad:</label>
            <select id="unidad"></select><br><br>
        </div>
        <div class="btnfolio"><button id="generar_folio_btn">Generar Folio</button><br><br>
            <label for="folio">Folio:</label>
            <label id="folio_label"></label><br><br>
        </div>
        <div class="usuario">
            <div class="titulos">Datos del interesado:<br></div>
            <input type="text" id="ape_pat" placeholder="Apellido Paterno"><br>
            <input type="text" id="ape_mat" placeholder="Apellido Materno"><br>
            <input type="text" id="nombres" placeholder="Nombre(s)"><br>
            <input type="text" id="expediente" placeholder="Num. Expediente"><br><br>
        </div>
        <div class="tclinica">
            <div class="titulos">Tiempo en clínica:</div>
            <div class="horas">
                <label for="hora_llegada">Hora de llegada:</label>
                <input type="time" id="hora_llegada">
                <label for="hora_salida">Hora de salida:</label>
                <input type="time" id="hora_salida">
            </div>
        </div>
        <div class="elaboro">
            <div class="titulos">Datos de quien elaboró:</div>
            <input type="text" id="elaboro" placeholder="Nombre completo de quien elaboró"><br><br>
        </div>
        <div class="check">
            <input type="checkbox" id="checkbox">
            <label for="checkbox">He leído con atención los datos ingresados de la constancia y comprendo que es mi
                responsabilidad capturar correctamente</label><br><br>
        </div>
        <div class="btnguardar">
            <button id="guardar_btn" disabled>Guardar</button>
            <button id="imprimir_btn" style="display:none;">Imprimir</button>
        </div>

        <div class="imagen"><img src="/img/base.jpg" alt=""></div>
    </section>
    <script src="scripts.js"></script>
</body>

</html>