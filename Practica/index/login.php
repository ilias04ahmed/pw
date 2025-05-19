<?php
session_start();


$conexion = new mysqli("localhost", "practica", "practica", "practica");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario_input = trim($_POST['usuario']);
    $password_input = $_POST['password'];

    // Buscar por nombre de usuario o correo
    $stmt = $conexion->prepare("SELECT usuario, correo, contrasenia, rol_codigo FROM usuarios WHERE usuario = ? OR correo = ?");
    $stmt->bind_param("ss", $usuario_input, $usuario_input);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $usuario = $result->fetch_assoc();

        if ($password_input == $usuario['contrasenia']) {
            $_SESSION['usuario'] = $usuario['usuario'];
            $_SESSION['rol'] = $usuario['rol_codigo'];

            // Redirigir según el rol
            if ($usuario['rol_codigo'] === 'admin') {
                header("Location: ../admin/admin_actividades.php");
            } else {
                header("Location: ../php/gestion_perfil.php");
            }
            exit;
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "Usuario o correo no encontrado.";
    }

    $stmt->close();
    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Iniciar Sesión</h1>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="" method="POST">
        <label>Usuario o correo: <input type="text" name="usuario" required></label><br>
        <label>Contraseña: <input type="password" name="password" required></label><br>
        <button type="submit" class="login-button">Iniciar Sesión</button>
    </form>
    <br>
    <button type="button" class="home-button" onclick="location.href='index.html'">Volver al Inicio</button>
</body>
</html>
