<?php
include("conexion.php");

$id=$_POST['id'];
$correo=$_POST['correo'];

$stmt=$con->prepare('UPDATE usuarios SET correo=? WHERE id=?');

$stmt->bind_param("si",$correo,$id);

if ($stmt->execute()) {
    echo "Registro Actualizado";
} else {
    echo "Error: " . $stmt->error;
}

$con->close();
?>
<meta http-equiv="refresh" content="3;url=pregunta4.php">