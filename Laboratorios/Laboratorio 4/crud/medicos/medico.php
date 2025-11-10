<?php
session_start();
include("../../authentication/conexion.php");

// Si no hay sesión, redirigir o mostrar mensaje
if (!isset($_SESSION['rol'])) {
    echo "<div style='padding:16px;color:#a00;'>Debes iniciar sesión para ver esta sección.</div>";
    exit();
}

// Detectar si el usuario es administrador
$isAdmin = ($_SESSION['rol'] === 'admin');

// Consultar médicos
$sql = "SELECT id, nombre, especialidad, telefono, correo FROM medicos ORDER BY nombre ASC";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Médicos Registrados</title>
    <!-- 🔹 Enlace al archivo de estilos CSS -->
    <link rel="stylesheet" href="../styles/medicos.css?v2">
</head>
<body>

<div class="medicos-header">
    <h2>Médicos Registrados</h2>
    <!-- 🔹 Botón de insertar: solo visible para admin -->
    <?php if ($isAdmin): ?>
        <button class="btn-insertar">Insertar</button>
    <?php endif; ?>
</div>

<div id="tabla-medicos">
    <?php if (!$result || mysqli_num_rows($result) === 0): ?>
        <p>No hay médicos registrados.</p>
    <?php else: ?>
        <table class="medicos-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Especialidad</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <!-- 🔹 Columna de acciones solo si es admin -->
                    <?php if ($isAdmin): ?>
                        <th>Acciones</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= htmlspecialchars($fila['nombre']) ?></td>
                        <td><?= htmlspecialchars($fila['especialidad']) ?></td>
                        <td><?= htmlspecialchars($fila['telefono']) ?></td>
                        <td><?= htmlspecialchars($fila['correo']) ?></td>

                        <!-- 🔹 Botones CRUD solo para admin -->
                        <?php if ($isAdmin): ?>
                            <td>
                                <button class="btn-editar" data-id="<?= $fila['id'] ?>">Editar</button>
                                <button class="btn-eliminar" data-id="<?= $fila['id'] ?>">Eliminar</button>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<script src="../../js/script.js"></script>
</body>
</html>

<?php mysqli_close($con); ?>
