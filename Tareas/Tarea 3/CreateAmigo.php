<?php
include ("conexion.php");
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$imagen = $_POST['imagen'];

$stmt = $con->prepare('INSERT INTO amigos(nombre, descripcion, image) VALUES (?,?,?)');
$stmt->bind_param("sss", $nombre, $descripcion, $imagen);
if($stmt->execute()){
    echo "Amigo agregado exitosamente.";
} else {
    echo "Error al agregar amigo: " . $stmt->error;
}

$con->close();
?>

<meta http-equiv="refresh" content="5;url=misamigos.php">