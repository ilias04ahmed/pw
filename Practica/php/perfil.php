<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <?php include('cabecera.php'); ?> 

    <main>
        <div class="perfil">
            <img src="../imagenes/thegrefg.jpg" alt="Foto de perfil" class="perfil_imagen">
            <h1 class="perfil_nombre">David Cánovas</h1>
            <p class="perfil_email"><strong>Email:</strong> david.canovas@example.com</p>
            <p class="perfil_edad"><strong>Edad:</strong> 28 años</p>
            <p class="perfil_ubicacion"><strong>Ubicación:</strong> Madrid, España</p>
            
            <button class="boton_buscar">Agregar amigo</button>
        </div>

        <section class="publicaciones">
            <h1>Publicaciones</h1>
            <div class="publicacion">
                <p>Marathon en Valencia</p>
                <p>👏 <strong>Aplausos:</strong> 5</p>
                <button class="boton-aplaudir">Aplaudir</button>
            </div>
            <div class="publicacion">
                <p>Senderismo por el bosque</p>
                <p>👏 <strong>Aplausos:</strong> 10</p>
                <button class="boton-aplaudir">Aplaudir</button>
            </div>
        </section>

        <button type= "submit" class="boton_buscar" onclick="location.href='buscar_amigos.php'">Volver atrás</button>
    </main>

</body>
</html>
