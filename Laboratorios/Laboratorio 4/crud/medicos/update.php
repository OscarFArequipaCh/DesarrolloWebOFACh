<?php
include("../../authentication/conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT id, nombre, especialidad, telefono, correo FROM medicos WHERE id = $id LIMIT 1";
    $res = mysqli_query($con, $sql);
    if ($row = mysqli_fetch_assoc($res)) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($row);
    } else {
        http_response_code(404);
        echo json_encode(["error" => "No encontrado"]);
    }
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Actualizar
    $id = intval($_POST['id']);
    $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
    $especialidad = mysqli_real_escape_string($con, $_POST['especialidad']);
    $telefono = mysqli_real_escape_string($con, $_POST['telefono']);
    $correo = mysqli_real_escape_string($con, $_POST['correo']);

    $sql = "UPDATE medicos
            SET nombre='$nombre', especialidad='$especialidad', telefono='$telefono', correo='$correo'
            WHERE id = $id";

    if (mysqli_query($con, $sql)) {
        echo "ok";
    } else {
        http_response_code(500);
        echo "Error: " . mysqli_error($con);
    }
    exit;
}
?>
