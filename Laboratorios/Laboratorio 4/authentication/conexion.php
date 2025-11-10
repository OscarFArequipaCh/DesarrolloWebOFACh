<?php 

$con=new mysqli("localhost","root","","db_citas_medicas2");
if($con->connect_error){
    die("conexion fallida".$con->connect_error);
}
?>