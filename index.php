<?php
session_start();
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id']; // Iniciar sesión
        $_SESSION['username'] = $user['username'];
        header("Location: proyecto.html"); // Redirigir a la página principal después de iniciar sesión
        exit();
    } else {
        echo "<p>Correo o contraseña incorrectos.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="styles.css"> <!-- Vincula el archivo CSS -->
</head>
<body>
    <div class="container">
        <h2>Iniciar sesión</h2>
        <form action="proyecto.html" method="POST">
            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" required><br><br>
            
            <label for="password">Contraseña:</label>
            <input type="password" name="password" required><br><br>
            
            <input type="submit" value="Iniciar sesión">
        </form>
        <p>¿No tienes cuenta? <a href="register.php">Regístrate</a></p>
    </div>
</body>
</html>
