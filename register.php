<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encriptar contraseña

    $sql = "INSERT INTO usuarios (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute([$username, $email, $password])) {
        header("Location: index.php"); // Redirigir a la página de login después del registro
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="styles.css"> <!-- Vincula el archivo CSS -->
</head>
<body>
    <div class="container">
        <h2>Formulario de Registro</h2>
        <form action="register.php" method="POST">
            <label for="username">Nombre de Usuario:</label>
            <input type="text" name="username" required><br><br>
            
            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" required><br><br>
            
            <label for="password">Contraseña:</label>
            <input type="password" name="password" required><br><br>
            
            <input type="submit" value="Registrar">
        </form>
        <p>¿Ya tienes una cuenta? <a href="index.php">Iniciar sesión</a></p>
    </div>
</body>
</html>
