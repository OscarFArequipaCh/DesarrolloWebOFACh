<?php
include 'conexion.php';
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$imagen = $_POST['imagen'];

$stmt = $con->prepare('UPDATE amigos SET nombre = ?, descripcion = ?, image = ? WHERE id = ?');
$stmt->bind_param("sssi", $nombre, $descripcion, $imagen, $id);
if($stmt->execute()){
    echo "Amigo actualizado exitosamente.";
} else {
    echo "Error al actualizar amigo: " . $stmt->error;
}
$con->close();
?>
<meta http-equiv="refresh" content="5;url=misamigos.php">