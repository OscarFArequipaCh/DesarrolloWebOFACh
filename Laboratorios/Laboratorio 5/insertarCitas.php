<?php
include("conexion.php");

$id_paciente = $_POST['id_paciente'];
$id_medico = $_POST['id_medico'];
$fecha_cita = $_POST['fecha_cita'];
$hora_cita = $_POST['hora_cita'];
$estado = $_POST['estado'];
$motivo = $_POST['motivo'];

$stmt = $con->prepare("INSERT INTO citas (id_paciente, id_medico, fecha_cita, hora_cita, estado, motivo) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("iissss", $id_paciente, $id_medico, $fecha_cita, $hora_cita, $estado, $motivo);

if($stmt->execute()){
    echo "Creada nueva Cita";
}else{
    echo "Error: ".$stmt->error;
}

$con->close();
?>