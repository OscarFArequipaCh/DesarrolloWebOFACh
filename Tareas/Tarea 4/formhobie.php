<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php session_start();
    require("VerificarSesion.php");
    ?>
    <nav class="navbar">
        <ul>
            <li><a href="yo.php">Yo</a></li>
            <li><a href="mifamilia.php">Mi familia</a></li>
            <li><a href="misamigos.php">Mis amigos</a></li>
            <li><a href="miciudad.php">Mi ciudad</a></li>
            <li><a href="mishobbies.php">Mis hobbies</a></li>
            <li><a href="formhobie.php">Agregar Hobies</a></li>
            <?php if(!isset($_SESSION["email"])){ ?>
                <li><a href="login.html">Iniciar Sesion</a></li>
            <?php } else { ?>
                <li><a href="CerrarSesion.php">Cerrar Sesion(<?php echo $_SESSION['email']?>)</a></li>
            <?php } ?>
        </ul>
    </nav>
    <div class="container">
        <form action="CreateHobie.php" method="post" enctype="multipart/form-data">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>
            <br>
            <label for="descripcion">Descripcion:</label>
            <input type="text" name="descripcion" required>
            <br>
            <label for="fotografia">Fotografia</label>
            <input type="file" name="fotografia" required>
            <br>
            <input type="submit" value="Agregar Hobie">
        </form>
    </div>
</body>
</html>