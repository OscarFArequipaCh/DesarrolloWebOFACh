<?php 
$con = mysqli_connect("localhost", "root", "", "db_citas_medicas2");
if (mysqli_connect_errno()) {
    die("Conexión fallida: " .mysqli_connect_error());
}
?>