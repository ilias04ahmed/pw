<?php
session_start();
$conexion = new mysqli("localhost", "practica", "practica", "practica");
if ($conexion->connect_error) die("Error de conexión: " . $conexion->connect_error);

$pais_id = isset($_GET['pais_id']) ? intval($_GET['pais_id']) : null;
$provincia_id = isset($_GET['provincia_id']) ? intval($_GET['provincia_id']) : null;

$paises = $conexion->query("SELECT id, nombre FROM paises ORDER BY nombre ASC");
$provincias = ($pais_id == 73) ? $conexion->query("SELECT id, nombre FROM provincias WHERE pais_id = $pais_id ORDER BY nombre ASC") : false;
$localidades = ($pais_id == 73 && $provincia_id) ? $conexion->query("SELECT id, nombre FROM localidades WHERE provincia_id = $provincia_id ORDER BY nombre ASC") : false;
$actividades = $conexion->query("SELECT id, nombre FROM tipos_actividad ORDER BY nombre ASC");

// Procesar formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $tipo_actividad_id = $_POST['tipo_actividad'];
    $pais_id = intval($_POST['pais_id']);

    if ($pais_id == 73) {
        $provincia_id = intval($_POST['provincia_id']);
        $localidad_id = intval($_POST['localidad_id']);
    } else {
        // --- Provincia ---
        $provincia_nombre = trim($_POST['provincia_texto']);
        $stmt = $conexion->prepare("SELECT id FROM provincias WHERE nombre = ? AND pais_id = ?");
        $stmt->bind_param("si", $provincia_nombre, $pais_id);
        $stmt->execute();
        $stmt->bind_result($provincia_id);
        if (!$stmt->fetch()) {
            $stmt->close();
            $stmt = $conexion->prepare("INSERT INTO provincias (nombre, pais_id) VALUES (?, ?)");
            $stmt->bind_param("si", $provincia_nombre, $pais_id);
            $stmt->execute();
            $provincia_id = $stmt->insert_id;
        }
        $stmt->close();

        // --- Localidad ---
        $localidad_nombre = trim($_POST['localidad_texto']);
        $stmt = $conexion->prepare("SELECT id FROM localidades WHERE nombre = ? AND provincia_id = ?");
        $stmt->bind_param("si", $localidad_nombre, $provincia_id);
        $stmt->execute();
        $stmt->bind_result($localidad_id);
        if (!$stmt->fetch()) {
            $stmt->close();
            $stmt = $conexion->prepare("INSERT INTO localidades (nombre, provincia_id) VALUES (?, ?)");
            $stmt->bind_param("si", $localidad_nombre, $provincia_id);
            $stmt->execute();
            $localidad_id = $stmt->insert_id;
        }
        $stmt->close();
    }

    // Insertar usuario
    $stmt = $conexion->prepare("INSERT INTO usuarios 
        (usuario, correo, contrasenia, nombre, apellidos, fecha_nacimiento, tipo_actividad_id, localidad_id, provincia_id, pais_id, rol_codigo)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'usuario')");
    $stmt->bind_param("sssssssiii", $usuario, $correo, $password, $nombre, $apellidos, $fecha_nacimiento,
        $tipo_actividad_id, $localidad_id, $provincia_id, $pais_id);
    $stmt->execute();
    $stmt->close();

    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="../css/style.css">
    <script>
        function actualizarPais(select) {
            const paisId = select.value;
            location.href = 'registro.php?pais_id=' + paisId;
        }
        function actualizarProvincia(select) {
            const paisId = document.getElementById('pais_id').value;
            const provinciaId = select.value;
            location.href = 'registro.php?pais_id=' + paisId + '&provincia_id=' + provinciaId;
        }
    </script>
</head>
<body>
    <h2>Registro de Usuario</h2>
    <form method="POST" action="registro.php">
        <label>Usuario: <input type="text" name="usuario" required></label><br>
        <label>Nombre: <input type="text" name="nombre" required></label><br>
        <label>Apellidos: <input type="text" name="apellidos" required></label><br>
        <label>Correo: <input type="email" name="correo" required></label><br>
        <label>Contraseña: <input type="password" name="password" required></label><br>
        <label>Fecha de nacimiento: <input type="date" name="fecha_nacimiento" required></label><br>

        <label>País:
            <select name="pais_id" id="pais_id" onchange="actualizarPais(this)" required>
                <option value="">Seleccione un país</option>
                <?php while ($p = $paises->fetch_assoc()): ?>
                    <option value="<?= $p['id'] ?>" <?= ($p['id'] == $pais_id) ? 'selected' : '' ?>><?= $p['nombre'] ?></option>
                <?php endwhile; ?>
            </select>
        </label><br>

        <?php if ($pais_id == 73): ?>
            <?php if ($provincias && $provincias->num_rows > 0): ?>
                <label>Provincia:
                    <select name="provincia_id" id="provincia_id" onchange="actualizarProvincia(this)" required>
                        <option value="">Seleccione una provincia</option>
                        <?php while ($pr = $provincias->fetch_assoc()): ?>
                            <option value="<?= $pr['id'] ?>" <?= ($pr['id'] == $provincia_id) ? 'selected' : '' ?>><?= $pr['nombre'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </label><br>
            <?php endif; ?>

            <?php if ($localidades && $localidades->num_rows > 0): ?>
                <label>Localidad:
                    <select name="localidad_id" id="localidad_id" required>
                        <option value="">Seleccione una localidad</option>
                        <?php while ($l = $localidades->fetch_assoc()): ?>
                            <option value="<?= $l['id'] ?>"><?= $l['nombre'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </label><br>
            <?php endif; ?>
        <?php elseif ($pais_id): ?>
            <!-- País distinto de España -->
            <label>Provincia: <input type="text" name="provincia_texto" required></label><br>
            <label>Localidad: <input type="text" name="localidad_texto" required></label><br>
        <?php endif; ?>

        <label>Tipo de Actividad:
            <select name="tipo_actividad" required>
                <option value="">Seleccione una actividad</option>
                <?php while ($a = $actividades->fetch_assoc()): ?>
                    <option value="<?= $a['id'] ?>"><?= $a['nombre'] ?></option>
                <?php endwhile; ?>
            </select>
        </label><br>

        <button type="submit">Registrarte</button>
    </form>
</body>
</html>
