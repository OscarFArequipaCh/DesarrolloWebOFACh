<?php session_start();
include("conexion.php");
require("verificarsesion.php");
require("verificarnivel.php");

$correo=$_POST['correo'];
$password=$_POST['password'];
$nombre=$_POST['nombre'];
$nivel=$_POST['nivel'];
$id=$_POST['id'];

$stmt=$con->prepare('UPDATE usuarios SET correo=?,password=?,nombre=?,nivel=? WHERE id=?');

$stmt->bind_param("sssii",$correo,$password,$nombre,$nivel,$id);

if($stmt->execute()){
    echo "Registro Actualizado";
} else {
    echo "Error: " . $stmt->error;
}
$con->close();
?>
<meta http-equiv="refresh" content="3;url=readusuarios.php">