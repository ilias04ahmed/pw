<?php include('cabecera_admin.php'); ?>
<?php include('../items/cabecera_items.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tipos de Actividad</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="admin">

    <main class="admin_panel">
        <h1 class="admin_titulo"> Gestión de Tipos de Actividad</h1>
        <p class="admin_descripcion">Añade, modifica o elimina los tipos de actividad disponibles.</p>

        <div class="admin_contenedor">
            <section class="admin_box">
                <h1 class="admin_subtitulo">Agregar Tipo de Actividad</h1>
                <form action="agregar_tipo.php" method="post" class="admin_form">
                    <label for="actividad" class="admin_label">Actividad:</label>
                    <input type="text" id="actividad" name="actividad" class="admin_input" required>
                    <button type="submit" class="boton_admin">Agregar</button>
                </form>
            </section>

            <section class="admin_box">
                <h1 class="admin_subtitulo">Modificar/Eliminar Tipos</h1>
                <ul class="admin_lista">
                    <li>
                        <span>BOXEO</span>
                        <div class="admin_botones">
                        <button type="submit" class="boton_admin_editar">Editar</button>
                        <button type="submit" class="boton_admin_eliminar" onclick="return confirm('¿Seguro que quieres eliminar esta actividad?')">Eliminar</button>
                        </div>
                    </li>
                    <li>
                        <span>BALONMANO</span>
                        <div class="admin_botones">
                        <button type="submit" class="boton_admin_editar">Editar</button>
                        <button type="submit" class="boton_admin_eliminar" onclick="return confirm('¿Seguro que quieres eliminar esta actividad?')">Eliminar</button>
                        </div>
                    </li>
                </ul>
            </section>
        </div>
    </main>

</body>
</html>

