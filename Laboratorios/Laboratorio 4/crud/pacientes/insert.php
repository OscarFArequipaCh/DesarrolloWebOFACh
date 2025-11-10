<?php
include("../../authentication/conexion.php");

$nombre = $_POST['nombre'];
$documento = $_POST['documento'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

$sql = "INSERT INTO pacientes (nombre, documento, telefono, correo)
        VALUES ('$nombre', '$documento', '$telefono', '$correo')";

if (mysqli_query($con, $sql)) {
    echo "ok";
} else {
    echo "Error: " . mysqli_error($con);
}
?>
