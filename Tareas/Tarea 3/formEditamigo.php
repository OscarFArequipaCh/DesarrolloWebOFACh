<?php
include 'conexion.php';
$id = $_GET['id'];
$result = $con->query("SELECT * FROM amigos WHERE id = $id");
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="navbar">
        <ul>
            <li><a href="yo.html">Yo</a></li>
            <li><a href="mifamilia.html">Mi familia</a></li>
            <li><a href="misamigos.php">Mis amigos</a></li>
            <li><a href="miciudad.html">Mi ciudad</a></li>
            <li><a href="mishobbies.html">Mis hobbies</a></li>
            <li><a href="formamigo.html">Agregar Amigos</a></li>
        </ul>
    </nav>
    <div class="container">
        <form action="Editamigo.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required>
            <br>
            <label for="descripcion">Descripcion:</label>
            <input type="text" name="descripcion" value="<?php echo $row['descripcion']; ?>" required>
            <br>
            <label for="imagen">Imagen URL:</label>
            <input type="text" name="imagen" value="<?php echo $row['image']; ?>"required>
            <br>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="submit" value="Guardar Cambios">
        </form>
    </div>
</body>
</html>