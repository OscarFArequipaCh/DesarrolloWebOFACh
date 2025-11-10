<?php
include("../../authentication/conexion.php");

$nombre = $_POST['nombre'];
$especialidad = $_POST['especialidad'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

$sql = "INSERT INTO medicos (nombre, especialidad, telefono, correo)
        VALUES ('$nombre', '$especialidad', '$telefono', '$correo')";

if (mysqli_query($con, $sql)) {
    echo "ok";
} else {
    echo "Error: " . mysqli_error($con);
}
?>
