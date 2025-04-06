<?php session_start();
include("conexion.php");
require("verificarsesion.php");
require("verificarnivel.php");


$producto=$_POST['producto'];
$precio=$_POST['precio'];
$imagen="";
if (isset($_FILES['imagen'])) {
    $datosimagen = explode(".", $_FILES['imagen']['name']);
    $imagen = uniqid().".".$datosimagen[1];
    copy($_FILES['imagen']['tmp_name'],"images/". $imagen);
}

$stmt = $con->prepare('INSERT INTO productos(producto,precio,imagen) VALUES(?,?,?)');

$stmt->bind_param("sds", $producto, $precio, $imagen);


// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Nuevo registro creado con éxito";
} else {
    echo "Error: " . $stmt->error;
}

$con->close();
?>
<meta http-equiv="refresh" content="3;url=principal.php">