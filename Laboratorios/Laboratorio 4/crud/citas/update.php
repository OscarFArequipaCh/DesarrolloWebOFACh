<?php
include("../../authentication/conexion.php");

if (!isset($_POST['id'])) {
  http_response_code(400);
  echo "ID requerido";
  exit;
}

$id = intval($_POST['id']);
$id_medico = $_POST['id_medico'];
$id_paciente = $_POST['id_paciente'];
$fecha_cita = $_POST['fecha_cita'];
$hora_cita = $_POST['hora_cita'];
$estado = $_POST['estado'];
$motivo = mysqli_real_escape_string($con, $_POST['motivo']);

$sql = "UPDATE citas
        SET id_paciente='$id_paciente', id_medico='$id_medico', 
            fecha_cita='$fecha_cita', hora_cita='$hora_cita',
            estado='$estado', motivo='$motivo'
        WHERE id = $id";

if (mysqli_query($con, $sql)) {
  echo "ok";
} else {
  echo "Error: " . mysqli_error($con);
}
?>
