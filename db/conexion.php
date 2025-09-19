<?php
$host = "localhost";
$usuario = "root";
$clave = "";
$bd = "nombre_de_tu_base";

try {
    $conn = new PDO("mysql:host=$host;dbname=$bd;charset=utf8", $usuario, $clave);
    // Configurar errores de PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Conexión exitosa con PDO";
} catch (PDOException $e) {
    echo "❌ Error de conexión: " . $e->getMessage();
}
?>
