<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formulario de Constancias Médicas</title>
</head>
<body>

<div style="text-align: center;">
    <label id="fecha_hora"></label><br><br>
    <label for="unidad">Unidad:</label>
    <select id="unidad"></select><br><br>
    <button id="generar_folio_btn">Generar Folio</button><br><br>
    <label for="folio">Folio:</label>
    <label id="folio_label"></label><br><br>
    Datos del interesado:<br>
    <input type="text" placeholder="Apellido Paterno"><br>
    <input type="text" placeholder="Apellido Materno"><br>
    <input type="text" placeholder="Nombre(s)"><br>
    <input type="text" placeholder="Num. Expediente"><br><br>
    Tiempo en clínica:<br>
    <label for="hora_llegada">Hora de llegada:</label>
    <input type="time" id="hora_llegada"><br>
    <label for="hora_salida">Hora de salida:</label>
    <input type="time" id="hora_salida"><br><br>
    Datos de quien elaboró:<br>
    <input type="text" placeholder="Nombre y apellido de quien elaboró"><br><br>
    <input type="checkbox" id="checkbox">
    <label for="checkbox">He leído con atención los datos ingresados de la constancia y comprendo que es mi responsabilidad capturar correctamente</label><br><br>
    <button id="guardar_btn" disabled>Guardar</button>
    <button id="imprimir_btn" style="display:none;">Imprimir</button>
</div>

<script src="scripts.js"></script>
</body>
</html>
