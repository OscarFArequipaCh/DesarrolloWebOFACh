<?php
include("conexion.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$especialidad = $_POST['especialidad'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

$stmt = $con->prepare("UPDATE medicos SET nombre=?, especialidad=?, telefono=?, correo=? WHERE id=$id");
$stmt->bind_param("ssss", $nombre, $especialidad, $telefono, $correo);

if($stmt->execute()){
    echo "Medico actualizado con exito";
}else{
    echo "Error: ".$stmt->error;
}

$con->close();
?>