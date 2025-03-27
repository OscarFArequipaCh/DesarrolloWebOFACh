<?php session_start();
include("conexion.php");
require("verificarsesion.php");
require("verificarnivel.php");

$correo=$_POST['correo'];
$password = sha1($_POST['password']);
$nombre=$_POST['nombre'];
$nivel=$_POST['nivel'];

$smt=$con->prepare('INSERT INTO usuarios(correo,password,nombre,nivel) VALUES (?,?,?,?)');
$smt->bind_param("sssi",$correo,$password,$nombre,$nivel);

if($smt->execute()){
    echo "Nuevo registro creado con éxito";
} else {
    echo "Error: " . $smt->error;
}
$con->close();
?>
<meta http-equiv="refresh" content="3;url=readusuarios.php">