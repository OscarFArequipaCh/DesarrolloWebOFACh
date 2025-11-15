<?php
include("conexion.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$documento = $_POST['documento'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

$stmt = $con->prepare("UPDATE pacientes SET nombre=?, documento=?, telefono=?, correo=? WHERE id=$id");
$stmt->bind_param("ssss", $nombre, $documento, $telefono, $correo);

if($stmt->execute()){
    echo "Paciente actualizado con exito";
}else{
    echo "Error: ".$stmt->error;
}

$con->close();
?>