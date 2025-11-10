<?php
session_start();

// Verificar si hay sesión iniciada
if (!isset($_SESSION['correo'])) {
    // Redirigir al login con mensaje de error
    header("Location: ../authentication/login.html?error=Debe+iniciar+sesion");
    exit();
}

// Verificar rol si se especifica
if (isset($rol_permitido)) {
    if ($_SESSION['rol'] !== $rol_permitido) {
        echo "🚫 Acceso denegado: no tienes permiso para acceder a esta página.";
        exit();
    }
}
?>
