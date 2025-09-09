<?php session_start();
include 'conexion.php';
$result = $con->query("SELECT * FROM hobies");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Álbum familiar digital">
    <title>Hobbies</title>
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
            <li><a href="formhobie.php">Agregar Hobbies</a></li>
            <?php if(!isset($_SESSION["email"])){ ?>
                <li><a href="login.html">Iniciar Sesion</a></li>
            <?php } else { ?>
                <li><a href="CerrarSesion.php">Cerrar Sesion(<?php echo $_SESSION['email']?>)</a></li>
            <?php } ?>
        </ul>
    </nav>
    <div class="container">
        <h1>Mis hobbies y pasatiempos</h1>
        <?php while($row = $result->fetch_assoc()){ ?>
            <h2><?php echo $row['nombre']; ?></h2>
            <p><?php echo $row['descripcion']; ?></p>
            <div class="gallery">
                <img src="<?php echo $row['fotografia']; ?>" alt="Hobby">
            </div>
            <div>
                <a href="DeleteHobie.php?id=<?php echo $row['id']; ?>">Eliminar</a>
                <a href="formEditHobie.php?id=<?php echo $row['id']; ?>">Editar</a>
            </div>
        <?php } ?>
        <p>Puedes ver mis redes sociales <a href="enviamemensaje.php">aqui.</a></p>
    </div>
</body>
</html>