<?php
include 'db/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario_id = $_POST['usuario_id'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];

    $sql = "INSERT INTO clientes (usuario_id, direccion, telefono, fecha_nacimiento) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $usuario_id, $direccion, $telefono, $fecha_nacimiento);

    if ($stmt->execute()) {
        echo "Perfil de cliente creado correctamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
