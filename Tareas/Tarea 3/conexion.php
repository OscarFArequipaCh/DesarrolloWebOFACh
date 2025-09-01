<?php

$con = mysqli_connect("localhost", "root", "", "bd_blogpersonal");
if (mysqli_connect_errno()) {
    die("Conexión fallida: " .mysqli_connect_error());
}

?>