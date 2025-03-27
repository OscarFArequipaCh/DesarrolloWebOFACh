<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Profesion</title>
    <link rel="stylesheet" href="stylesforms.css"/>
</head>
<body>
    <?php session_start();
    include("conexion.php"); 
    require("verificarsesion.php");
    require("verificarnivel.php");
    $id=$_GET['id'];
    $sql="SELECT id,nombre FROM profesiones WHERE id=$id";
    $resultado=$con->query($sql);
    $row = $resultado->fetch_assoc();
    ?>
    <div class="container">
        <form action="editprofesiones.php"method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $row['nombre'];?>"><br>
            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
            <input type="submit" value="Guardar">
        </form>
    </div>   
</body>
</html>