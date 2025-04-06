<?php session_start();
include("conexion.php");
require("verificarsesion.php");
require("verificarnivel.php");

$id=$_GET['id'];

$stmt=$con->prepare('DELETE FROM productos WHERE id=?');
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Registro eliminado con éxito";
} else {
    echo "Error: " . $stmt->error;
}
$con->close();

?>
<meta http-equiv="refresh" content="3;url=principal.php">