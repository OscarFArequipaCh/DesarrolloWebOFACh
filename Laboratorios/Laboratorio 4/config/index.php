<?php
session_start();

// Verificar si hay sesión iniciada
if (!isset($_SESSION['rol'])) {
    // Si no hay sesión, redirigir al login con mensaje
    header("Location: ../authentication/login.html?error=Debe+iniciar+sesion");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema Hospitalario</title>
  <link rel="stylesheet" href="../styles/index.css">
</head>
<body>
  <header>
    <h1>Hospital General</h1>
  </header>

  <div id="contenedor">
    <aside id="menu">
      <button class="boton-menu" onclick="cargarContenido('../crud/medicos/medico.php')">MÉDICOS</button>
      <button class="boton-menu" onclick="cargarContenido('../crud/pacientes/paciente.php')">PACIENTES</button>
      <button class="boton-menu" onclick="cargarContenido('../crud/citas/citas.php')">CITAS</button>
      <button class="boton-menu" onclick="window.location.href='../authentication/cerrar.php'">CERRAR SESIÓN</button>
    </aside>

    <main id="principal">
      <h1>Bienvenido al sistema hospitalario.</h1>
    </main>
  </div>

  <div id="mensaje">Mensaje del sistema</div>

  <!-- Modal -->
  <div id="modal" style="display: none; position: fixed; top: 20%; left: 40%; background: white; padding: 10px; border: solid 1px black;">
      <img src="" id="imagen-modal" style="width: 200px; height: 200px;">
      <br>
      <button onclick="cerrarModal()" type="button">Cerrar</button>
  </div>

  <!-- JS -->
  <script src="../js/script.js"></script>
</body>
</html>
