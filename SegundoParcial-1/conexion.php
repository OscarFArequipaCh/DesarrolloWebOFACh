<?php
$con = mysqli_connect("localhost", "root", "", "bd_recetas");
if(mysqli_connect_errno()){
    die("Se produjo un error".mysqli_connect_errno());
}
?>