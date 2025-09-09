<?php session_start();
include 'conexion.php';
require("VerificarSesion.php");
$id = $_GET['id'];
$stmt = $con->prepare('DELETE FROM hobies WHERE id = ?');
$stmt->bind_param('i', $id);
if($stmt->execute()){
    echo "Hobie eliminado exitosamente.";
} else {
    echo "Error al eliminar Hobie: " . $stmt->error;
}
$con->close();
?>
<meta http-equiv="refresh" content="5;url=misHobbies.php">