<?php
$host = 'localhost'; // Cambia esto si no es localhost
$dbname = 'kaanfsqp_usuario_db';
$username = 'kaanfsqp_usuario_db'; // Tu usuario de base de datos
$password = 'FrXA2Gb3eX4ag89WDpx5'; // Tu contraseña de base de datos

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
