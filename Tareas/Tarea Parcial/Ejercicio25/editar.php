<?php  session_start();
include("conexion.php");
require("verificarsesion.php");
require("verificarnivel.php");

$id=$_POST['id'];
$pruducto=$_POST['producto'];
$precio=$_POST['precio'];
$imagen="";

if (isset($_FILES['imagen'])) {
    $datosimagen = explode(".", $_FILES['imagen']['name']);
    $imagen = uniqid().".".$datosimagen[1];
    copy($_FILES['imagen']['tmp_name'],"images/". $imagen);

    $stmt=$con->prepare('UPDATE productos SET producto=?, precio=?, imagen=? WHERE id=?');
    $stmt->bind_param("sdsi", $pruducto, $precio, $imagen, $id);
} else {
    $stmt=$con->prepare('UPDATE productos SET producto=?, precio=? WHERE id=?');
    $stmt->bind_param("sdi", $pruducto, $precio, $id);
}

if ($stmt->execute()) {
    echo "Registro actualizado con éxito";
} else {
    echo "Error: " . $stmt->error;
}
$con->close();

?>
<meta http-equiv="refresh" content="3;url=principal.php">