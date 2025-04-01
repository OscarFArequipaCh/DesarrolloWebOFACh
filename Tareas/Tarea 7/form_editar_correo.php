<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Correo</title>
    <link rel="stylesheet" href="stylesform.css">
</head>
<body>
    <?php
    include("conexion.php");
    $id=$_GET['id'];
    $sql="SELECT id,nombres,apellidos,correo FROM usuarios WHERE id=$id";
    $resultado=$con->query($sql);
    $row = $resultado->fetch_assoc();
    ?>
    <div class="container">
        <form action="editcorreo.php" method="post">
            <p><strong>Nombres y Apellidos:</strong> <?php echo $row['nombres'];?> <?php echo $row['apellidos'];?></p>
            
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" name="correo" value="<?php echo $row['correo'];?>">
            </div>
            
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>