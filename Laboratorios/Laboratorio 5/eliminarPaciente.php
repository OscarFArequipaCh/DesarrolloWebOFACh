<?php
include("conexion.php");

$id = $_GET['id'];

$stmt = $con->prepare("DELETE FROM pacientes WHERE id=?");
$stmt->bind_param("i", $id);

if($stmt->execute()){
    echo "Paciente eliminado exitosamente";
} else {
    echo "Error: ".$stmt->error;
}

$con->close();
?>