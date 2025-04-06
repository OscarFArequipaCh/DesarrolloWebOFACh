<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php session_start();
    include("conexion.php");
    require("verificarsesion.php");
    require("verificarnivel.php");
    $id = $_GET['id'];
    $sql = "SELECT id,producto,precio,imagen FROM productos WHERE id=$id";

    $resultado = $con->query($sql);
    $row = $resultado->fetch_assoc();

    ?>
    <form action="editar.php" method="post" enctype="multipart/form-data">
        <label for="producto">Nombre de Producto:</label>
        <input type="text" name="producto" value="<?php echo $row['producto']; ?>">
        <br>
        <label for="precio">Precio:</label>
        <input type="float" name="precio" value="<?php echo $row['precio']; ?>">
        <br>
        <?php if ($row["imagen"] != "") {
            ?> <img src="images/<?php echo $row["imagen"]; ?>" width="100px" alt="">
        <?php } ?>
        <label for="imagen">imagen:</label>
        <input type="file" name="imagen">
        <br>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="submit" value="Guardar">

    </form>
</body>
</html>