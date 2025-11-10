<?php
include("../../authentication/conexion.php");

if (!isset($_GET['id'])) {
    http_response_code(400);
    echo "ID requerido";
    exit;
}

$id = intval($_GET['id']);
$sql = "DELETE FROM pacientes WHERE id = $id LIMIT 1";

if (mysqli_query($con, $sql)) {
    echo "ok";
} else {
    http_response_code(500);
    echo "Error: " . mysqli_error($con);
}
?>