<?php
include 'db/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario_id = $_POST['usuario_id'];
    $razon_social = $_POST['razon_social'];
    $nit = $_POST['nit'];
    $categoria = $_POST['categoria'];
    $nivel_formalizacion = $_POST['nivel_formalizacion'];
    $descripcion = $_POST['descripcion'];
    $sitio_web = $_POST['sitio_web'];
    $redes_sociales = $_POST['redes_sociales'];

    $sql = "INSERT INTO emprendedores (usuario_id, razon_social, nit, categoria, nivel_formalizacion, descripcion, sitio_web, redes_sociales) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssssss", $usuario_id, $razon_social, $nit, $categoria, $nivel_formalizacion, $descripcion, $sitio_web, $redes_sociales);

    if ($stmt->execute()) {
        echo "Perfil de emprendedor creado correctamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
