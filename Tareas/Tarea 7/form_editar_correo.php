<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cprreo</title>
</head>
<body>
    <?php
    include("conexion.php");
    $id=$_GET['id'];
    $sql="SELECT id,nombres,apellidos,correo FROM usuarios WHERE id=$id";
    $resultado=$con->query($sql);
    $row = $resultado->fetch_assoc();
    ?>
    <form action="editcorreo.php" method="post">
        <label for="nombres">Nombres y Apellidos: <?php echo $row['nombres'];?> <?php echo $row['apellidos'];?></label><br>
        <label for="correo">Correo:</label>
        <input type="email" name="correo" value="<?php echo $row['correo'];?>"><br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>