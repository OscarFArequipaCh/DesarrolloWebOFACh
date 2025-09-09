<?php session_start(); ?>
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
        <h1>Mi Familia</h1>
        <p>A continuacion aqui esta mi familia mas cercana:</p>
        <div class="targets">
            <div class="target">
                <img src="file:///D://Multimedia/Camara/IMG_20200318_193144.jpg" alt="mama">
                <h3>Delia Chavarria Choque</h3>
                <p>Mi mama, con 55 años de edad, profesora de primaria.</p>
            </div>
            <div class="target">
                <img src="file:///D://Multimedia/Camara/IMG_20200501_135037.jpg" alt="hermano">
                <h3>Antony William Costano Chavarria</h3>
                <p>Mi hermano con 36 años, es profesor de matematicas de nivel secundario</p>
            </div>
            <div class="target">
                <img src="file:///D://Multimedia/Camara/IMG_20201206_173731.jpg" alt="hermana">
                <h3>Mishel Emilia Arequipa Chavarria</h3>
                <p>Mi hermana menor con 23 años, estudia diseño y animacion</p>
            </div>
            <div class="target">
                <img src="file:///D://Multimedia/Camara/IMG_20190929_201027.jpg" alt="sobrino">
                <h3>Andy Isaias Costano Quispe</h3>
                <p>Mi pequeño ahijado, que esta en segundo de primaria con 7 añitos</p>
            </div>
            <div class="target">
                <img src="file:///D://Multimedia/Camara/IMG_20210922_190134.png" alt="abuelo">
                <h3>Felix Chavarria Cadiz</h3>
                <p>Mi abuelo con 90 años de edad, fue profesor rural, ahora estando jubilado</p>
            </div>
            <div class="target">
                <img src="file:///D://Multimedia/Camara/IMG_20211103_115439.jpg" alt="cuñada">
                <h3>Isabel Quispe Peñaranda</h3>
                <p>Es la pareja de mi hermano, sindo la mama de mi ahijado</p>
            </div>
        </div>
        <p>Puedes ver mis redes sociales <a href="enviamemensaje.php">aqui.</a></p>
    </div>
</body>
</html> 