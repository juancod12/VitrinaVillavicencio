<?php
$host = "localhost";
$usuario = "root";
$clave = "";
$bd = "vitrina_digital";

try {
    $conn = new PDO("mysql:host=$host;dbname=$bd;charset=utf8", $usuario, $clave);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "❌ Error de conexión: " . $e->getMessage();
}
?>
