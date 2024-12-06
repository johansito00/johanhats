<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirigir si no está autenticado
    exit();
}

echo "<h1>Bienvenido " . $_SESSION['username'] . "</h1>";
echo "<p>Has iniciado sesión correctamente.</p>";
echo "<a href='logout.php'>Cerrar sesión</a>";
?>

