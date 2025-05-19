<?php include('cabecera_admin.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Usuarios</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="admin">

    <main>
        <h1 class="titulo_buscar">🔎 Buscar Usuarios</h1>
        <p class="descripcion_buscar">Aquí puedes buscar, modificar o eliminar usuarios.</p>

        <form action="buscar" method="get" class="formulario_buscar">
            <label for="busqueda" class="admin_label">Buscar usuario:</label>
            <input type="text" id="busqueda" name="busqueda" class="admin_input" placeholder="Ingresa el nombre o correo del usuario">
            <button type="submit" class="boton_admin">Buscar</button>
        </form>

        <section class="resultado_busqueda">
            <div class="usuario_card">
                <img src="../imagenes/thegrefg.jpg" alt="Foto de perfil" class="usuario_imagen">
                <div class="usuario_info">
                    <h2 class="usuario_nombre">David Cánovas</h2>
                    <p class="ultima_actividad"><strong>Última actividad:</strong> Marathon</p>
                </div>
                <div class="usuario_acciones">
                    <a href="modificar_usuario.php" class="boton_modificar">Modificar</a>
                    <a href="eliminar_usuario.php" class="boton_eliminar" onclick="return confirm('¿Seguro que quieres dar de baja a este usuario?')">Dar de Baja</a>
                </div>
            </div>

            <div class="usuario_card">
                <img src="../imagenes/illojuan.jpg" alt="Foto de perfil" class="usuario_imagen">
                <div class="usuario_info">
                    <h2 class="usuario_nombre">Juan Alberto Garcia</h2>
                    <p class="ultima_actividad"><strong>Última actividad:</strong> Senderismo</p>
                </div>
                <div class="usuario_acciones">
                    <a href="modificar_usuario.php" class="boton_modificar">Modificar</a>
                    <a href="eliminar_usuario.php" class="boton_eliminar" onclick="return confirm('¿Seguro que quieres dar de baja a este usuario?')">Dar de Baja</a>
                </div>
            </div>
        </section>
        </section>
    </main>

</body>
</html>

