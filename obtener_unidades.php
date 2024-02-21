<?php
$servername = "localhost"; 
$username = "root";
$password = "58407329_Jc";
$database = "constancias_medicas";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener las unidades
$sql = "SELECT ID, nombre FROM unidades";
$result = $conn->query($sql);

// Array para almacenar las unidades
$unidades = array();

// Si hay resultados, agregar cada fila al array de unidades
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $unidades[] = $row;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();

// Establecer la cabecera como JSON
header('Content-Type: application/json');

// Devolver los datos en formato JSON
echo json_encode($unidades);
?>
