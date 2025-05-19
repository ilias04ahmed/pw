<?php include('cabecera.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar Actividades</title>
    <link rel="stylesheet" href="../css/style.css"> 
</head>
<body>

<main class="publicar_actividades">

    <h1 class="titulo_actividades">Publicar Actividades</h1>

    <p class="descripcion_actividades">Comparte nuevas actividades con la comunidad.</p>

    <form action="tablon_actividades.php" method="POST" class="formulario_actividades">

        <label for="titulo" class="label_actividades">Título de la actividad:</label>
        <input type="text" id="titulo" name="titulo" class="input_actividades" placeholder="Ejemplo: Ruta en bicicleta" required>

        <label for="tipo_actividad" class="label_actividades">Tipo de actividad:</label>
        <select id="tipo_actividad" name="tipo_actividad" class="select_actividades" required>
            <option value="ciclismo_ruta">Ciclismo en Ruta</option>
            <option value="ciclismo_mtb">Ciclismo MTB</option>
            <option value="senderismo">Senderismo</option>
            <option value="carrera">Carrera</option>
        </select>

        <label for="ruta" class="label_actividades">Subir Ruta (GPX):</label>
        <input type="file" id="ruta" name="ruta" class="input_actividades" accept=".gpx">

        <label for="compañeros" class="label_actividades">Compañeros de Actividad:</label>

        <select id="tipo_actividad" name="tipo_actividad" class="select_actividades" required>
            <option value="Usuario1">Usuario1</option>
            <option value="Usuario2">Usuario2</option>
            <option value="Usuario3">Usuario3</option>
            <option value="Usuario4">Usuario4</option>
        </select>

        <label for="imagenes" class="label_actividades">Subir Imágenes:</label>

        <input type="file" id="imagenes" name="imagenes[]" class="input_actividades" multiple accept="image/*">

        <button type="submit" class="boton_actividades">Publicar</button>

    </form>
</main>
</body>
</html>