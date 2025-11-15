<?php
include("conexion.php");

$titulo = $_POST['titulo'];
$idtiporeceta = $_POST['idtiporeceta'];
$preparacion = $_POST['preparacion'];
$fotografia = $_POST['fotografia'];

$stmt = $con->prepare('INSERT INTO recetas(fotografia, titulo, idtiporeceta, preparacion) VALUES (?,?,?,?)');
$stmt->bind_param("ssis", $fotografia, $titulo, $idtiporeceta, $preparacion);
if($stmt->execute()){
    echo "Insertado nueva receta";
}else{
    echo "Error".$stmt->error;
}

$con->close();
?>