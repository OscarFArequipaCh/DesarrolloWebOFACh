<?php
include("conexion.php");

$id = $_GET['id'];

$stmt = $con->prepare("DELETE FROM medicos WHERE id=?");
$stmt->bind_param("i", $id);

if($stmt->execute()){
    echo "Medico eliminado exitosamente";
} else {
    echo "Error: ".$stmt->error;
}

$con->close();
?>