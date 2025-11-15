<?php
include("conexion.php");

$nombre = $_POST['nombre'];
$especialidad = $_POST['especialidad'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

$stmt = $con->prepare("INSERT INTO medicos (nombre, especialidad, telefono, correo) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nombre, $especialidad, $telefono, $correo);

if($stmt->execute()){
    echo "Insertado nuevo medico";
}else{
    echo "Error: ".$stmt->error;
}

$con->close();
?>