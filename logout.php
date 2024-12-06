<?php
session_start();
session_destroy(); // Eliminar la sesión
header("Location: login.php"); // Redirigir al login
exit();
?>
