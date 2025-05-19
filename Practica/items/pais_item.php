<?php include('../admin/cabecera_admin.php'); ?>
<?php include('../items/cabecera_items.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Países</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="admin">

    <main class="admin_panel">
        <h1 class="admin_titulo">Gestión de Países</h1>
        <p class="admin_descripcion">Añade, modifica o elimina países en la base de datos.</p>

        <div class="admin_contenedor">
            <section class="admin_box">
                <h1 class="admin_subtitulo">Agregar País</h1>
                <form action="agregar_pais.php" method="post" class="admin_form">
                    <label for="pais" class="admin_label">País:</label>
                    <input type="text" id="pais" name="pais" class="admin_input" required>
                    <button type="submit" class="boton_admin">Agregar</button>
                </form>
            </section>

            <section class="admin_box">
                <h1 class="admin_subtitulo">Modificar/Eliminar Países</h1>
                <ul class="admin_lista">
                    <li>
                        <span>España</span>
                        <div class="admin_botones">
                        <button type="submit" class="boton_admin_editar">Editar</button>
                        <button type="submit" class="boton_admin_eliminar" onclick="return confirm('¿Seguro que quieres eliminar este país?')">Eliminar</button>
                        </div>
                    </li>
                    <li>
                        <span>Argentina</span>
                        <div class="admin_botones">
                        <button type="submit" class="boton_admin_editar">Editar</button>
                        <button type="submit" class="boton_admin_eliminar" onclick="return confirm('¿Seguro que quieres eliminar este país?')">Eliminar</button>
                        </div>
                    </li>
                </ul>
            </section>
        </div>
    </main>

</body>
</html>
