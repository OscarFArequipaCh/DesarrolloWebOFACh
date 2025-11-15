<?php
include("conexion.php");

$id = $_GET['id'];

$stmt = $con->prepare("DELETE FROM citas WHERE id=?");
$stmt->bind_param("i", $id);

if($stmt->execute()){
    echo "Cita eliminada exitosamente";
} else {
    echo "Error: ".$stmt->error;
}

$con->close();
?>