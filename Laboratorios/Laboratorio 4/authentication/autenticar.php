<?php
session_start();
include("conexion.php"); // Conexión MySQL

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario_input = $_POST['usuario'] ?? '';
    $clave_input   = $_POST['clave'] ?? '';

    // Convertir a SHA1 para comparar con la BD
    $clave_sha1 = sha1($clave_input);

    // Consulta preparada usando los nombres correctos de la tabla
    $stmt = $con->prepare("SELECT * FROM usuarios WHERE usuario=? AND clave=?");
    $stmt->bind_param("ss", $usuario_input, $clave_sha1);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        $_SESSION['usuario']    = $usuario['usuario'];
        $_SESSION['id_usuario'] = $usuario['id'];
        $_SESSION['rol']        = $usuario['rol'];
        header("Location: ../config/index.php"); // redirige al dashboard
        exit;
    } else {
        echo "<script>alert('Usuario o contraseña incorrectos');window.location='../log/login.html';</script>";
    }
} else {
    echo "Método no permitido.";
}
?>
