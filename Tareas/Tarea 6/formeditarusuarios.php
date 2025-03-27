<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="stylesforms.css"/>
</head>
<body>
    <?php session_start();
    include("conexion.php");
    require("verificarsesion.php");
    require("verificarnivel.php");
    $id=$_GET['id'];
    $sql="SELECT id,correo,nombre,password,nivel FROM usuarios WHERE id=$id";
    $resultado=$con->query($sql);
    $row = $resultado->fetch_assoc();
    ?>
    <div class="container">
        <form action="editusuarios.php"method="post">
            <label for="correo">Correo Elctronico:</label>
            <input type="email" name="correo" value="<?php echo $row['correo'];?>">
            <br>
            <label for="nombre">Nombre de Usuario:</label>
            <input type="text" name="nombre" value="<?php echo $row['nombre'];?>">
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" value="<?php echo $row['password'];?>">
            <br>
            <label for="nivel">Nivel de Acceso:</label>
            <input type="number" name="nivel" value="<?php echo $row['nivel'];?>">
            <br>
            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
            <input type="submit" value="Guardar">
        </form>
    </div>
</body>
</html>