<?php
include("../../authentication/conexion.php");

// Evita que MySQLi lance excepciones automáticamente
mysqli_report(MYSQLI_REPORT_OFF);

$id_medico = $_POST['id_medico'];
$id_paciente = $_POST['id_paciente'];
$fecha_cita = $_POST['fecha_cita'];
$hora_cita = $_POST['hora_cita'];
$estado = $_POST['estado'];
$motivo = mysqli_real_escape_string($con, $_POST['motivo']);

$sql = "INSERT INTO citas (id_paciente, id_medico, fecha_cita, hora_cita, estado, motivo)
        VALUES ('$id_paciente', '$id_medico', '$fecha_cita', '$hora_cita', '$estado', '$motivo')";

try {
    if (mysqli_query($con, $sql)) {
        echo "ok";
    } else {
        // Si falla pero no lanza excepción (modo compatibilidad)
        if (mysqli_errno($con) == 1062) {
            echo "Hora no disponible para este médico.";
        } else {
            echo "Error al registrar la cita: " . mysqli_error($con);
        }
    }
} catch (mysqli_sql_exception $e) {
    // Captura errores lanzados como excepciones
    if ($e->getCode() == 1062) {
        echo "Hora no disponible para este médico.";
    } else {
        echo "Error al registrar la cita: " . $e->getMessage();
    }
}
?>
