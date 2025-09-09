<?php session_start();
include 'conexion.php';
require("VerificarSesion.php");
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$fotografia = $_FILES['fotografia'];

$rutadestino = 'images/';

if(!empty($fotografia['name'])){
    $extension = explode(".", $fotografia['name']);
    $nuevoNombre = uniqid(). "." . $extension[1];
    copy($fotografia['tmp_name'], $rutadestino . $nuevoNombre);
    $fotografia = $rutadestino . $nuevoNombre;

    $stmt = $con->prepare('UPDATE hobies SET nombre = ?, descripcion = ?, fotografia = ? WHERE id = ?');
    $stmt->bind_param("sssi", $nombre, $descripcion, $fotografia, $id);
} else {
    $stmt = $con->prepare('UPDATE hobies SET nombre = ?, descripcion = ? WHERE id = ?');
    $stmt->bind_param("ssi", $nombre, $descripcion, $id);
}

if($stmt->execute()){
    echo "Hobie actualizado exitosamente.";
} else {
    echo "Error al actualizar Hobie: " . $stmt->error;
}
$con->close();
?>
<meta http-equiv="refresh" content="5;url=mishobbies.php">