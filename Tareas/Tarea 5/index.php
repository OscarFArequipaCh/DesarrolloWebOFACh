<?php
session_start();
require_once "Pila.php";

if (!isset($_SESSION['pila'])) {
    $_SESSION['pila'] = new Pila();
}

$pila = $_SESSION['pila'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['eliminar'])) {
        $mensaje = $pila->eliminar();
        $_SESSION['pila'] = $pila;
    } elseif (isset($_POST['salir'])) {
        session_destroy();
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h2>Menú de la Pila</h2>
    <form method="POST">
        <a href="insertar.php"><button type="button">Insertar</button></a>
        <a href="mostrar.php"><button type="button">Mostrar</button></a>
        <button type="submit" name="eliminar">Eliminar</button>
        <button type="submit" name="salir">Salir</button>
    </form>

    <?php if (isset($mensaje)) { echo "<p>$mensaje</p>"; } ?>
</body>
</html>