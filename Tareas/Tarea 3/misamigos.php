<?php
include 'conexion.php';
$result = $con->query("SELECT * FROM amigos");
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
        <h1>Mi Círculo Social</h1>
        <p>Estos son mis amigos y personas importantes en mi vida.</p>
        <div class="targets">
            <?php while($row = $result->fetch_assoc()){ ?>
                <div class="target">
                    <img src="<?php echo $row['image']; ?>" alt="Amigo">
                    <h3><?php echo $row['nombre']; ?></h3>
                    <p><?php echo $row['descripcion']; ?></p>
                    <div>
                        <a href="Deleteamigo.php?id=<?php echo $row['id']; ?>">Eliminar</a>
                        <a href="formEditamigo.php?id=<?php echo $row['id']; ?>">Editar</a>
                    </div>
                </div>
            <?php } ?>
        </div>
        <p>Puedes ver mis redes sociales <a href="enviamemensaje.html">aqui.</a></p>
    </div>
</body>
</html>       
        
        
        
        
        