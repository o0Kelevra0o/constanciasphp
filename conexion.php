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
} else {
    echo "Conexión exitosa";
}
?>
