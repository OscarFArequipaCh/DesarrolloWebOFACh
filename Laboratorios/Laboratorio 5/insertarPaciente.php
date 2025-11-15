<?php
include("conexion.php");

$nombre = $_POST['nombre'];
$documento = $_POST['documento'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

$stmt = $con->prepare("INSERT INTO pacientes (nombre, documento, telefono, correo) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nombre, $documento, $telefono, $correo);

if($stmt->execute()){
    echo "Insertado nuevo paciente";
}else{
    echo "Error: ".$stmt->error;
}

$con->close();
?>