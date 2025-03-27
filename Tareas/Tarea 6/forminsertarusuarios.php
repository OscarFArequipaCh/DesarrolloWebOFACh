<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Uusuario</title>
    <link rel="stylesheet" href="stylesforms.css"/>
</head>
<body>
    <?php session_start();
    require("verificarsesion.php");
    require("verificarnivel.php");
    ?>
    <div class="container">
        <form action="createusuarios.php"method="post">
            <label for="correo">Correo Electronico:</label>
            <input type="text" name="correo">
            <br>
            <label for="nombre">Nombre de Usuario:</label>
            <input type="text" name="nombre">
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" name="password">
            <br>
            <label for="nivel">Nivel de Acceso:</label>
            <input type="number" name="nivel">
            <br>
            <input type="submit" value="Guardar">
        </form>
    </div>
</body>
</html>