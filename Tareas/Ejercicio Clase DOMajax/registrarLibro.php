<?php
include_once("conexion.php");

$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$anio = $_POST['anio'];
$ideditorial = $_POST['editorial'];
$idusuario = $_POST['usuario'];
$idcarrera = $_POST['carrera'];

$imgPath = "imagenes/" . basename($_FILES["imagen"]["name"]);
if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $imgPath)) {
    $sql = "INSERT INTO libros (imagen, titulo, autor, ideditorial, anio, idusuario, idcarrera)
            VALUES ('$imgPath', '$titulo', '$autor', $ideditorial, $anio, $idusuario, $idcarrera)";
    if ($con->query($sql)) {
        echo "ok";
    } else {
        echo "error al insertar";
    }
} else {
    echo "error al subir imagen";
}
?>