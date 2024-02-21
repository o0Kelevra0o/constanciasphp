<?php
// Verificar si se recibió la consulta SQL
if (isset($_POST['sql'])) {
    // Recibir la consulta SQL
    $sql = $_POST['sql'];

    // Crear conexión a la base de datos
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

    // Ejecutar la consulta SQL
    if ($conn->query($sql) === TRUE) {
        // Si la consulta se ejecuta con éxito, devolver código de estado 200 (OK)
        http_response_code(200);
    } else {
        // Si ocurre un error al ejecutar la consulta, devolver código de estado 500 (Error interno del servidor)
        http_response_code(500);
        echo "Error al ejecutar la consulta: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} elseif (isset($_GET['accion']) && $_GET['accion'] === 'obtener_ultimo_consecutivo' && isset($_GET['tabla'])) {
    // Si se solicita la acción de obtener el último consecutivo
    $tabla = $_GET['tabla'];
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

    $sql = "SELECT MAX(SUBSTRING(Folio, 3)) AS ultimo_consecutivo FROM $tabla";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $ultimoConsecutivo = intval($row['ultimo_consecutivo']);
        echo $ultimoConsecutivo;
    } else {
        echo 0;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    // Si no se recibió la consulta SQL, devolver código de estado 400 (Solicitud incorrecta)
    http_response_code(400);
    echo "No se recibió la consulta SQL o la acción solicitada.";
}
?>