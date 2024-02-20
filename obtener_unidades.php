<?php
include 'conexion.php';

$sql = "SELECT ID, nombre FROM unidades";
$result = $conn->query($sql);

$unidades = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $unidades[] = array(
            'ID' => $row['ID'],
            'nombre' => $row['nombre']
        );
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($unidades);
?>
