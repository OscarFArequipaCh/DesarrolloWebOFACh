<?php session_start();
include ("conexion.php");
require("VerificarSesion.php");
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$fotografia = $_FILES['fotografia'];

$destino = 'images/';

if(!empty($fotografia['name'])){
    $extension = pathinfo($fotografia['name'], PATHINFO_EXTENSION);
    $nuevoNombre = uniqid() . '.' . $extension;
    $rutaCompleta = $destino . $nuevoNombre;

    if(move_uploaded_file($fotografia['tmp_name'], $rutaCompleta)){
        $fotografia = $rutaCompleta;

        
    } else {
        echo "Error al subir la imagen.";

    }
} else {
    echo "No se ha proporcionado ninguna imagen.";
}


$stmt = $con->prepare('INSERT INTO hobies(nombre, descripcion, fotografia) VALUES (?,?,?)');
$stmt->bind_param("sss", $nombre, $descripcion, $fotografia);
if($stmt->execute()){
    echo "Hobie agregado exitosamente.";
} else {
    echo "Error al agregar Hobie: " . $stmt->error;
}

$con->close();


?>

<meta http-equiv="refresh" content="5;url=mishobbies.php">