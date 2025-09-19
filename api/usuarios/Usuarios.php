<?php
header("Content-Type: application/json");
require_once "../db/conexion.php";

// Consulta de ejemplo
$sql = "SELECT id, nombre, correo FROM usuarios";
$result = $conn->query($sql);

$usuarios = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }
}

echo json_encode($usuarios, JSON_UNESCAPED_UNICODE);
$conn->close();
?>
