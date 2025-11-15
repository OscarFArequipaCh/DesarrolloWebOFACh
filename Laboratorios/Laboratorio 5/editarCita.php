<?php
include("conexion.php");

$id = $_POST['id'];
$id_paciente = $_POST['id_paciente'];
$id_medico = $_POST['id_medico'];
$fecha_cita = $_POST['fecha_cita'];
$hora_cita = $_POST['hora_cita'];
$estado = $_POST['estado'];
$motivo = $_POST['motivo'];

$stmt = $con->prepare("UPDATE citas SET id_paciente=?, id_medico=?, fecha_cita=?, hora_cita=?, estado=?, motivo=? WHERE id=?");
$stmt->bind_param("iissssi", $id_paciente, $id_medico, $fecha_cita, $hora_cita, $estado, $motivo, $id);

if($stmt->execute()){
    echo "Cita actualizada con exito";
}else{
    echo "Error: ".$stmt->error;
}

$con->close();
?>