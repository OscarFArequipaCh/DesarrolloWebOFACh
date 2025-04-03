<?php
include("conexion.php");

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$cu = $_POST['cu'];
$sexo = $_POST['sexo'];
$carrera = $_POST['codigo_carrera'];

$rutaDestino = "images/";

for ($i = 0; $i < count($nombres); $i++) {
    if (!empty($_FILES['fotografia']['name'][$i])) {
        $extension = pathinfo($_FILES['fotografia']['name'][$i], PATHINFO_EXTENSION);
        $nombreArchivo = uniqid() . '.' . $extension;
        $rutaCompleta = $rutaDestino . $nombreArchivo;

        if (move_uploaded_file($_FILES['fotografia']['tmp_name'][$i], $rutaCompleta)) {
            $fotoGuardada = $nombreArchivo;
        } else {
            $fotoGuardada = "default.jpg";
        }
    } else {
        $fotoGuardada = "default.jpg";
    }
    $nombre = mysqli_real_escape_string($con, $nombres[$i]);
    $apellido = mysqli_real_escape_string($con, $apellidos[$i]);
    $cus = mysqli_real_escape_string($con, $cu[$i]);
    $sexoselect = mysqli_real_escape_string($con, $sexo[$i]);
    $codigocarrera = (int) $carrera[$i];

    $stmt=$con->prepare('INSERT INTO alumnos(fotografia,nombres,apellidos,cu,sexo,codigo_carrera) VALUES(?,?,?,?,?,?)');

    $stmt->bind_param("sssssi",$fotoGuardada,$nombre, $apellido, $cus, $sexoselect, $codigocarrera);

    if ($stmt->execute()) {
        echo "Nuevo registro creado con éxito";
    } else {
        echo "Error: " . $stmt->error;
    }
}


$con->close();
?>
<meta http-equiv="refresh" content="3;url=Tabla.php">



