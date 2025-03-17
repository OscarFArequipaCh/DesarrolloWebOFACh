<?php
session_start();
include("Pila.php");
require_once "Pila.php";


$_SESSION['pila'] = new Pila();


$pila = $_SESSION['pila'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['elemento'])) {
    $pila->insertar($_POST['elemento']);
    $_SESSION['pila'] = $pila;
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar en la Pila</title>
</head>
<body>
    <h2>Insertar Elemento</h2>
    <form method="POST">
        <label>Elemento a insertar:</label>
        <input type="text" name="elemento" required>
        <button type="submit">Insertar</button>
    </form>
    <br>
    <a href="index.php"><button type="button">Volver</button></a>
</body>
</html>
