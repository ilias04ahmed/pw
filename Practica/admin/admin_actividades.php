<?php include('cabecera_admin.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablón de Actividades</title>
    <link rel="stylesheet" href="../css/style.css"> 
</head>
<body class="admin">

<main class="admin_actividades">
    <h1 class="titulo_tablon">🎉 Tablón de Actividades 🎉</h1>
    <p class="descripcion_tablon">Explora las actividades compartidas por la comunidad</p>

    <div class="contenedor_actividades">
        <?php
        $actividades = [
            ["Ciclismo en Montaña 🚵‍♂️", "Ilias Ahmed", "Ciclismo MTB", "https://www.printmaps.net/wp-content/uploads/2020/05/biking-route-map-1024x665.png", "Mohamed Zarrouk, Dani Moya", "12"],
            ["Senderismo en Sierra Nevada 🏔️", "Mohamed Zarrouk", "Senderismo", "https://i0.wp.com/mtraining.es/wp-content/uploads/2017/10/Ruta-1-2-granada-1-1024x523.jpg?resize=600%2C306", "Ilias Ahmed", "8"],
            ["Maratón Ciudad de Madrid 🏃", "Dani Moya", "Carrera", "https://s2.ppllstatics.com/ideal/www/multimedia/202005/08/media/cortadas/ruta9-kpMB-U11096570570ZzD-624x385@Ideal.JPG", "Ninguno", "20"],
            ["Fútbol en el Parque ⚽", "Ilias Ahmed", "Fútbol Recreativo", "enlace", "Juanjo Trujillo,Daniel Alonso", "15"],
            ["Senderismo por el campo 🌼", "Daniel Alonso", "Senderismo", "enlace", "Dani Moya", "22"],
            ["Escalada en Roca 🧗‍♂️", "Mohamed Zarrouk", "Escalada", "enlace", "Ilias Ahmed", "9"],
            ["Caminata Nocturna 🌙", "Juanjo Trujillo", "Caminata", "enlace", "Daniel Alonso", "14"],
            ["Triatlón Universitario 🏊‍♂️🚴‍♂️🏃‍♂️", "Dani Moya", "Triatlón", "enlace", "Mohamed Zarrouk", "30"],
            ["Buceo en Aguas Profundas 🤿", "Ilias Ahmed", "Buceo", "enlace", "Juanjo Trujillo", "17"],
            ["Caminata al Amanecer 🌄", "Daniel Alonso", "Caminata", "enlace", "Ilias Ahmed", "19"],
            ["Carrera 10K 🏃", "Mohamed Zarrouk", "Carrera", "enlace", "Dani Moya", "25"],
        ];

        $actividades_por_pagina = 10;

        $total_actividades = count($actividades);

        $total_paginas = ceil($total_actividades / $actividades_por_pagina);

        $pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

        if ($pagina_actual < 1) $pagina_actual = 1;
        if ($pagina_actual > $total_paginas) $pagina_actual = $total_paginas;

        $inicio = ($pagina_actual - 1) * $actividades_por_pagina;

        $actividades_pagina = array_slice($actividades, $inicio, $actividades_por_pagina);

        foreach ($actividades_pagina as $actividad) {
            echo "<div class='actividad_admin'>";
            echo "<h1>{$actividad[0]}</h1>";
            echo "<p><strong>Publicado por:</strong> {$actividad[1]}</p>";
            echo "<p><strong>Tipo de actividad:</strong> {$actividad[2]}</p>";
            echo "<img src='{$actividad[3]}' alt='Mapa no disponible' class='mapa_actividad' 
                  onerror=\"this.onerror=null; this.src='https://previews.123rf.com/images/dvarg/dvarg1402/dvarg140200059/25942931-folleto-mapa-con-signo-de-interrogaci%C3%B3n-sobre-fondo-gris.jpg';\">";
            echo "<p><strong>Compañeros:</strong> {$actividad[4]}</p>";
            echo "<p>👏 <strong>Aplausos:</strong> {$actividad[5]}</p>";
            echo "<button class='boton_admin'>✏ Modificar</button>";
            echo "<button class='boton_admin'>🗑 Eliminar</button>";
            echo "</div>";
        }     
        ?>
    </div>

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