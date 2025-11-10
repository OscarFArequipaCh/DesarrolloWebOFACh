<?php
session_start();
include("../../authentication/conexion.php"); // <- Ruta corregida

// Si no hay sesión, redirigir o mostrar mensaje
if (!isset($_SESSION['rol'])) {
    echo "<div style='padding:16px;color:#a00;'>Debes iniciar sesión para ver esta sección.</div>";
    exit();
}

// Detectar si el usuario es administrador
$isAdmin = ($_SESSION['rol'] === 'admin');

// Consulta de todos los pacientes
$sql = "SELECT id, nombre, documento, telefono, correo FROM pacientes ORDER BY nombre ASC";
$result = mysqli_query($con, $sql);

if (!$result) {
    echo "<p style='color:red;'>Error en la consulta: " . mysqli_error($con) . "</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes Registrados</title>
    <!-- 🔹 Enlace al archivo de estilos -->
    <link rel="stylesheet" href="../styles/pacientes.css?v2">
</head>
<body>

<div class="pacientes-header">
    <h2>Pacientes Registrados</h2>
    <!-- 🔹 Botón de insertar solo para admin -->
    <?php if ($isAdmin): ?>
        <button class="btn-insertar-paciente" onclick="abrirFormularioInsertPaciente()">Insertar</button>
    <?php endif; ?>
</div>

<div id="tabla-pacientes">
    <?php if (mysqli_num_rows($result) === 0): ?>
        <p>No hay pacientes registrados.</p>
    <?php else: ?>
        <table class="pacientes-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <!-- 🔹 Columna de acciones solo para admin -->
                    <?php if ($isAdmin): ?>
                        <th>Acciones</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= htmlspecialchars($fila['nombre']) ?></td>
                        <td><?= htmlspecialchars($fila['documento']) ?></td>
                        <td><?= htmlspecialchars($fila['telefono']) ?></td>
                        <td><?= htmlspecialchars($fila['correo']) ?></td>

                        <!-- 🔹 Botones CRUD solo para admin -->
                        <?php if ($isAdmin): ?>
                            <td>
                                <button class="btn-editar-paciente" onclick="editarPaciente(<?= $fila['id'] ?>)">Editar</button>
                                <button class="btn-eliminar-paciente" onclick="eliminarPaciente(<?= $fila['id'] ?>)">Eliminar</button>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<!-- Contenedor del modal -->
<div id="modal-container" class="modal-container" style="display:none;"></div>

<script src="../../js/script.js"></script>
</body>
</html>

<?php mysqli_close($con); ?>
