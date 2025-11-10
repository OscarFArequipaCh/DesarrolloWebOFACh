<?php
include("../../authentication/conexion.php");

$id_medico = $_POST['id_medico'];
$id_paciente = $_POST['id_paciente'];
$fecha_cita = $_POST['fecha_cita'];
$hora_cita = $_POST['hora_cita'];
$estado = $_POST['estado'];
$motivo = mysqli_real_escape_string($con, $_POST['motivo']);

$sql = "INSERT INTO citas (id_paciente, id_medico, fecha_cita, hora_cita, estado, motivo)
        VALUES ('$id_paciente', '$id_medico', '$fecha_cita', '$hora_cita', '$estado', '$motivo')";

if (mysqli_query($con, $sql)) {
    echo "ok";
} else {
    echo "Error: " . mysqli_error($con);
}
?>

