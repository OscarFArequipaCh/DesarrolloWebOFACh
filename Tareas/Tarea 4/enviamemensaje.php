<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Página de enlaces a redes sociales">
    <title>Mis Redes Sociales</title>
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
        <h1>Conéctate conmigo</h1>
        <p>Sigue mis redes sociales y mantente en contacto.</p>
        <div class="social-links">
            <a href="https://facebook.com/oscarfelix.arequipachavarria" target="_blank">Facebook</a>
            <a href="https://tiktok.com/@oscararequipachavarria" target="_blank">TikTok</a>
        </div>
    </div>
</body>
</html>