<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar profesion</title>
    <link rel="stylesheet" href="stylesforms.css"/>
</head>
<body>
    <?php session_start();
    require("verificarsesion.php");
    require("verificarnivel.php");
    ?>
    <div class="container">
        <form action="createprofesiones.php"method="post">
            <label for="nombre">Nombre de la Profesion:</label>
            <input type="text" name="nombre"><br>
            <input type="submit" value="Guardar">
        </form>
    </div>
</body>
</html>