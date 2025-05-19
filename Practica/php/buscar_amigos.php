<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Amigos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <?php include('cabecera.php'); ?>

    <main>
        <h1 class="titulo_buscar">Buscar Amigos</h1>
        <p class="descripcion_buscar">Aquí podrás buscar y agregar nuevos amigos a tu círculo.</p>

        <form action="resultado_amigos.php" method="get" class="formulario_buscar">
            <label for="busqueda" class="label_buscar">Buscar amigos:</label>
            <input type="text" id="busqueda" name="busqueda" class="input_buscar" placeholder="Ingresa el nombre del usuario">
            <button type="submit" class="boton_buscar">Buscar</button>
        </form>


        <section class="resultado_busqueda">
            <div class="usuario_card">
                <img src="../imagenes/thegrefg.jpg" alt="Foto de perfil" class="usuario_imagen">
                <div class="usuario_info">
                    <h2 class="usuario_nombre">David Cánovas</h2>
                    <p class="ultima_actividad"><strong>Última actividad:</strong> Marathon</p>
                </div>
                <div class="usuario_acciones">
                    <a href="perfil.php" class="boton_perfil">Ver Perfil</a>
                </div>
            </div>

            <div class="usuario_card">
                <img src="../imagenes/illojuan.jpg" alt="Foto de perfil" class="usuario_imagen">
                <div class="usuario_info">
                    <h2 class="usuario_nombre">Juan Alberto Garcia</h2>
                    <p class="ultima_actividad"><strong>Última actividad:</strong> Senderismo</p>
                </div>
                <div class="usuario_acciones">
                <button class="boton_perfil">Añadir amigo</button>
                </div>
            </div>
        </section>
    </main>

</body>
</html>


