<?php
include("Pila.php");
session_start();

if (!isset($_SESSION['pila'])) {
    $_SESSION['pila'] = new Pila();
}

$pila = $_SESSION['pila'];
$elementos = $pila->mostrar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Pila</title>
</head>
<body>
    <h2>Elementos en la Pila</h2>
    
    <br>
    <a href="index.php"><button type="button">Volver</button></a>
</body>
</html>
