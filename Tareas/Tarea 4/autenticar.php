<?php
session_start();
include 'conexion.php';
$email = $_POST['email'];
$password = sha1($_POST['password']);

$stmt = $con->prepare('SELECT correo, password FROM usuarios WHERE correo = ? AND password = ?');
$stmt->bind_param('ss', $email, $password);
$stmt->execute();
$stmt->store_result();
if($stmt->num_rows > 0){
    $_SESSION['email'] = $email;
    echo "Autenticación exitosa. Redirigiendo a la página principal...";
    header("Refresh: 2; URL=yo.php");
} else {
    echo "Error de autenticación. Correo o contraseña incorrectos.";
    header("Refresh: 2; URL=login.html");
}
