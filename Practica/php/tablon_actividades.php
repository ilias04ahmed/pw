<?php include('cabecera.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablón de Actividades</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<main class="tablon_actividades">
    <h1 class="titulo_tablon">🎉 Tablón de Actividades 🎉</h1>
    <p class="descripcion_tablon">Explora las actividades compartidas por otros deportistas</p>

    <?php
    try {
        // Crear una nueva conexión PDO
        $conn = new PDO('mysql:host=localhost;dbname=practica', 'practica', 'practica');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Conexión exitosa!";
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }

    // Registro del aplauso
    if (isset($_POST['aplaudir'])) {
        $actividad_id = $_POST['actividad_id'];
        $usuario = 'nombre_de_usuario'; // Aquí deberías obtener el nombre del usuario de sesión o similar

        // Verificar si ya se ha dado un aplauso
        $query_check = "SELECT * FROM aplausos WHERE actividad_id = :actividad_id AND usuario = :usuario";
        $stmt_check = $conn->prepare($query_check);
        $stmt_check->execute(['actividad_id' => $actividad_id, 'usuario' => $usuario]);

        if ($stmt_check->rowCount() == 0) {
            // Registrar el aplauso
            $query_insert = "INSERT INTO aplausos (actividad_id, usuario) VALUES (:actividad_id, :usuario)";
            $stmt_insert = $conn->prepare($query_insert);
            if ($stmt_insert->execute(['actividad_id' => $actividad_id, 'usuario' => $usuario])) {
                header("Location: tablón_actividades.php");
                exit();
            } else {
                echo "Error al registrar aplauso.";
            }
        } else {
            echo "Ya has aplaudido esta actividad.";
        }
    }

    // Número de actividades por página
    $actividades_por_pagina = 10;

    // Obtener el total de actividades
    $query_total = "SELECT COUNT(*) AS total FROM actividades";
    $result_total = $conn->query($query_total);
    $row_total = $result_total->fetch(PDO::FETCH_ASSOC);
    $total_actividades = $row_total['total'];

    // Calcular el número total de páginas
    $total_paginas = max(1, ceil($total_actividades / $actividades_por_pagina));

    // Obtener la página actual desde la URL (por defecto, página 1)
    $pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

    if ($pagina_actual < 1) $pagina_actual = 1;
    if ($pagina_actual > $total_paginas) $pagina_actual = $total_paginas;

    // Calcular el índice de inicio para la paginación
    $inicio = ($pagina_actual - 1) * $actividades_por_pagina;

    // Consultar las actividades para la página actual
    $query = "SELECT * FROM actividades LIMIT $inicio, $actividades_por_pagina";
    $result = $conn->query($query);
    ?>

    <div class="contenedor_actividades">
        <?php
        if ($result->rowCount() > 0) {
            $id_mapa = 0;
            while ($actividad = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='actividad'>";
                echo "<h1>{$actividad['titulo']}</h1>";
                echo "<p><strong>Publicado por:</strong> {$actividad['autor']}</p>";
                echo "<p><strong>Tipo de actividad:</strong> {$actividad['tipo']}</p>";

                echo "<img src='{$actividad['imagen1']}' class='imagen_actividad'>";
                echo "<img src='{$actividad['imagen2']}' class='imagen_actividad'>";

                // Aquí iría el código del mapa Leaflet...

                echo "<p><strong>Compañeros:</strong> {$actividad['companeros']}</p>";

                $actividad_id = $actividad['id'];
                $query_aplausos = "SELECT COUNT(*) AS total_aplausos FROM aplausos WHERE actividad_id = $actividad_id";
                $result_aplausos = $conn->query($query_aplausos);
                $row_aplausos = $result_aplausos->fetch(PDO::FETCH_ASSOC);
                $total_aplausos = $row_aplausos['total_aplausos'];

                echo "<p><strong>Aplausos:</strong> $total_aplausos</p>";

                echo "<form method='POST' action=''>";
                echo "<input type='hidden' name='actividad_id' value='{$actividad['id']}'>";
                echo "<button type='submit' name='aplaudir' class='boton-aplaudir'>👏 Aplaudir</button>";
                echo "</form>";

                echo "</div>";
                $id_mapa++;
            }
        } else {
            echo "<p>No hay actividades disponibles.</p>";
        }
        ?>
    </div>

    <!-- Paginación -->
    <div class="paginacion">
        <?php if ($pagina_actual > 1): ?>
            <a href="?pagina=<?= $pagina_actual - 1 ?>" class="boton">Anterior</a>
        <?php endif; ?>

        <span>Página <?= $pagina_actual ?> de <?= $total_paginas ?></span>

        <?php if ($pagina_actual < $total_paginas): ?>
            <a href="?pagina=<?= $pagina_actual + 1 ?>" class="boton">Siguiente</a>
        <?php endif; ?>
    </div>
</main>

</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conn = null;
?>

