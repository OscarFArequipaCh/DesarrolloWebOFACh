<?php session_start();
include("conexion.php");
require("verificarsesion.php");
require("verificarnivel.php");


$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$fecha_nacimiento=$_POST['fecha_nacimiento'];
$sexo=$_POST['sexo'];
$correo=$_POST['correo'];
$profesion_id=$_POST['profesion_id'];

//$sql="INSERT INTO personas(nombres,apellidos,fecha_nacimiento,sexo,correo) VALUES('$nombres','$apellidos','$fecha_nacimiento','$sexo','$correo')";


$stmt=$con->prepare('INSERT INTO personas(nombres,apellidos,fecha_nacimiento,sexo,correo,profesion_id) VALUES(?,?,?,?,?,?)');

// Vincular parámetros
$stmt->bind_param("ssssss",$nombres, $apellidos,$fecha_nacimiento,$sexo,$correo,$profesion_id);



// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Nuevo registro creado con éxito";
} else {
    echo "Error: " . $stmt->error;
}

$con->close();
?>
<meta http-equiv="refresh" content="3;url=read.php">
