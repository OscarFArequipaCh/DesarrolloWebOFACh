<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Álbum familiar digital">
    <title>Álbum Familiar</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="navbar">
        <ul>
            <li><a href="yo.php">Yo</a></li>
            <li><a href="mifamilia.php">Mi familia</a></li>
            <li><a href="misamigos.php">Mis amigos</a></li>
            <li><a href="miciudad.php">Mi ciudad</a></li>
            <li><a href="mishobbies.php">Mis hobbies</a></li>
            <?php if(!isset($_SESSION["email"])){ ?>
                <li><a href="login.html">Iniciar Sesion</a></li>
            <?php } else { ?>
                <li><a href="CerrarSesion.php">Cerrar Sesion(<?php echo $_SESSION['email']?>)</a></li>
            <?php } ?>
        </ul>
    </nav>
    <div class="container">
        <h1>Sucre</h1>
        <p>Grandes lugares.</p>
        <div class="gallery">
            <img src="file:///D://Multimedia/Descargas/ciudad1.png" alt="Foto 1">
            <img src="file:///D://Multimedia/Descargas/cuidad2.png" alt="Foto 2">
            <img src="file:///D://Multimedia/Descargas/cuidad3.png" alt="Foto 3">
            <img src="file:///D://Multimedia/Descargas/ciudad4.png" alt="Foto 4">
            <img src="file:///D://Multimedia/Descargas/ciudad5.png" alt="Foto 5">
        </div>
        <p>Puedes ver mis redes sociales <a href="enviamemensaje.php">aqui.</a></p>
    </div>
</body>
</html>