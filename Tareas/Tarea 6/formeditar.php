<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylesforms.css"/>
</head>
<body>
    <?php session_start();
    include("conexion.php"); 
    require("verificarsesion.php");
    require("verificarnivel.php");
    $id=$_GET['id'];
    $sql="SELECT id,nombres,apellidos,fecha_nacimiento,sexo,correo,profesion_id FROM personas WHERE id=$id";
    $resultado=$con->query($sql);
    $row = $resultado->fetch_assoc();
    $sql = "SELECT id,nombre from profesiones order by nombre";
    $result = mysqli_query($con, $sql);
    ?>
    <div class="container">
        <form action="edit.php"method="post">
            <label for="nombres">Nombres:</label>
            <input type="text" name="nombres" value="<?php echo $row['nombres'];?>">
            <br>
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" value="<?php echo $row['apellidos'];?>">
            <br>
            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" name="fecha_nacimiento" value="<?php echo $row['fecha_nacimiento'];?>">
            <br>
            <label for="sexo">Sexo:</label>
            <input type="radio" name="sexo" value="Masculino" 
            <?php echo $row['sexo'] == 'Masculino' ? 'checked' : '';   ?> >Masculino
            <input type="radio" name="sexo" value="Femenino" 
            <?php echo $row['sexo'] == 'Femenino' ? 'checked' : '';   ?>>Femenino
            <br>
            <label for="correo">Correo:</label>
            <input type="email" name="correo" value="<?php echo $row['correo'];?>">
            <br>
            <label for="profesion">Profesión:</label>
            <select name="profesion_id">
                <?php
                while ($row2 = mysqli_fetch_assoc($result)) {
                    ?>
                    <option value="<?php echo $row2['id']; ?>" <?php echo $row['profesion_id'] == $row2['id'] ? "selected" : ""; ?>>
                        <?php echo $row2['nombre']; ?></option>
                <?php } ?>
            </select>
            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
            <input type="submit" value="Guardar">
        </form>
    </div>
</body>
</html>