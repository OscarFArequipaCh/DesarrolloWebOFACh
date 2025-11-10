<?php
session_start();

// Si no hay sesión activa, redirigir al login
if(!isset($_SESSION['correo'])){
    header("Location: log/login.html"); // login.html está en log/
    exit;
}

// Si la sesión está activa, redirigir directamente al CRUD
header("Location: ../config/index.php"); // admin.php está en crud/
exit;
?>
