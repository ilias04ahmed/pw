<?php include('../admin/cabecera_admin.php'); ?>
<?php include('../items/cabecera_items.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Gestión de Localidades</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="admin">

    <main class="admin_panel">
        <h1 class="admin_titulo">Gestión de Localidades</h1>

        <div class="admin_contenedor">
            <section class="admin_box">
                <h1 class="admin_subtitulo">Agregar Localidad</h1>
                <form action="agregar_localidad.php" method="post" class="admin_form">
                    
                    <label for="pais" class="admin_label">País:</label>
                    <select id="pais" name="pais" class="admin_input" required>
                        <option value="">Selecciona un país</option>
                        <option value="espana">España</option>
                        <option value="portugal">Portugal</option>
                        <option value="marruecos">Marruecos</option>
                    </select>

                    <label for="provincia" class="admin_label">Provincia:</label>
                    <select id="provincia" name="provincia" class="admin_input" required>
                        <option value="">Selecciona una provincia</option>

                        <optgroup label="España">
                            <option value="madrid">Madrid</option>
                            <option value="barcelona">Barcelona</option>
                            <option value="valencia">Valencia</option>
                        </optgroup>

                        <optgroup label="Portugal">
                            <option value="lisboa">Lisboa</option>
                            <option value="oporto">Oporto</option>
                            <option value="braga">Braga</option>
                        </optgroup>

                        <optgroup label="Marruecos">
                            <option value="casablanca">Casablanca</option>
                            <option value="marrakech">Marrakech</option>
                            <option value="tanger">Tánger</option>
                        </optgroup>
                    </select>

                    <label for="nombre" class="admin_label">Nombre de la Localidad:</label>
                    <input type="text" id="nombre" name="nombre" class="admin_input" required>

                    <button type="submit" class="boton_admin">Agregar</button>
                </form>
            </section>

            <section class="admin_box">
                <h1 class="admin_subtitulo">Modificar/Eliminar Localidades</h1>
                <ul class="admin_lista">
                    <li>
                        <span>Granada (España / Andalucía)</span>
                        <div class="admin_botones">
                            <button type="submit" class="boton_admin_editar">Editar</button>
                            <button type="submit" class="boton_admin_eliminar" onclick="return confirm('¿Seguro que quieres eliminar esta localidad?')">Eliminar</button>
                        </div>
                    </li>
                    <li>
                        <span>Oporto (Portugal / Oporto)</span>
                        <div class="admin_botones">
                            <button type="submit" class="boton_admin_editar">Editar</button>
                            <button type="submit" class="boton_admin_eliminar" onclick="return confirm('¿Seguro que quieres eliminar esta localidad?')">Eliminar</button>
                        </div>
                    </li>
                    <li>
                        <span>Marrakech (Marruecos / Marrakech)</span>
                        <div class="admin_botones">
                            <button type="submit" class="boton_admin_editar">Editar</button>
                            <button type="submit" class="boton_admin_eliminar" onclick="return confirm('¿Seguro que quieres eliminar esta localidad?')">Eliminar</button>
                        </div>
                    </li>
                </ul>
            </section>
        </div>
    </main>

</body>
</html>

