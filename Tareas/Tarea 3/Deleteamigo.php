<?php
include 'conexion.php';
$id = $_GET['id'];
$stmt = $con->prepare('DELETE FROM amigos WHERE id = ?');
$stmt->bind_param('i', $id);
if($stmt->execute()){
    echo "Amigo eliminado exitosamente.";
} else {
    echo "Error al eliminar amigo: " . $stmt->error;
}
$con->close();
?>
<meta http-equiv="refresh" content="5;url=misamigos.php">