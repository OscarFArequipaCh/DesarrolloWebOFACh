<?php
include("conexion.php");

$id=$_POST["id"];
$calificacion=$_POST["calificacion"];

$stmt = $con->prepare('UPDATE alumnos SET calificacion=? WHERE id=?');

$stmt->bind_param("si", $calificacion, $id);

if($stmt->execute()){
    echo "actuaizado";
}else {
    echo "error".$stmt->error;
}
$con->close();

?>