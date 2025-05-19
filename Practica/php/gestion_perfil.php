<?php include 'cabecera.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Perfil</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <main>
        <div>
            <form>
                <label>Nombre: <input type="text" name="nombre" value="Ilias" disabled required></label><br>
                <label>Apellidos: <input type="text" name="apellidos" value="Ahmed Ahmed" disabled required></label><br>
                <label>Fecha de Nacimiento: <input type="date" name="fecha_nacimiento" value="2004-10-06" disabled required></label><br>
                <label>País:
                    <select name="pais" id="pais" disabled required>
                        <option value="España" selected>España</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Marruecos">Marruecos</option>
                    </select>
                </label><br>
                <label>Provincia:
                    <select name="provincia" id="provincia" disabled required>
                        <option value="Ceuta" selected>Ceuta</option>
                    </select>
                </label><br>
                <label>Localidad:
                    <select name="localidad" id="localidad" disabled required>
                        <option value="Ceuta" selected>Ceuta</option>
                    </select>
                </label><br>
                <label>Tipo de Actividad Preferida: <input type="text" name="tipo_actividad" value="Ciclismo" disabled required></label><br>
                <button type="button" id="editar-btn" >Editar Perfil</button>
                <button type="submit" id="guardar-btn" style="display: none;">Guardar Cambios</button>
            </form>
        </div>
        
        <br>
        <button class="home-button" onclick="location.href='../index/index.html'">
            Cerrar Sesión
        </button>
    </main>
    
</body>
</html>
