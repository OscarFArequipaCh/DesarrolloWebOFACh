<?php
session_start();
include("../../authentication/conexion.php");

// Verificar si hay sesión
if (!isset($_SESSION['rol'])) {
    echo "<div style='padding:16px;color:#a00;'>Debes iniciar sesión para ver esta sección.</div>";
    exit();
}

$isAdmin = ($_SESSION['rol'] === 'admin');

// Fecha límite: 1 mes desde hoy
$hoy = date('Y-m-d');
$fin_mes = date('Y-m-d', strtotime('+1 month'));
$anio_actual = date('Y');

// Consulta para mostrar solo citas dentro del año actual y un mes máximo
$sql = "SELECT c.id, c.fecha_cita, c.hora_cita, c.estado, c.motivo,
        p.nombre AS nombre_paciente,
        m.nombre AS nombre_medico, m.especialidad AS especialidad_medico
        FROM citas c
        JOIN pacientes p ON c.id_paciente = p.id
        JOIN medicos m ON c.id_medico = m.id
        WHERE YEAR(c.fecha_cita) = '$anio_actual' AND c.fecha_cita <= '$fin_mes'
        ORDER BY c.fecha_cita ASC, c.hora_cita ASC";

$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Citas Médicas</title>
<link rel="stylesheet" href="../styles/citas.css?v2">
<style>
/* Colores por estado */
.estado-pendiente {
    background-color: #ffeb99; /* amarillo claro */
    color: #664d00;
    font-weight: bold;
}
.estado-confirmada {
    background-color: #b3ffb3; /* verde */
    color: #004d00;
    font-weight: bold;
}
.estado-atendida {
    background-color: #4da6ff; /* azul */
    color: #fff;
    font-weight: bold;
}
/* Parpadeo para "siendo atendida" */
@keyframes parpadeo {
    0% {opacity: 1;}
    50% {opacity: 0.3;}
    100% {opacity: 1;}
}
.estado-en-progreso {
    background-color: #ff6666; /* rojo claro */
    color: #fff;
    font-weight: bold;
    animation: parpadeo 1s infinite;
}
</style>
</head>
<body>

<div class="citas-header">
    <h2>Citas Médicas</h2>
    <?php if ($isAdmin): ?>
        <div style="background-color: #129e4f;
        width: 150px;
        padding: 10px 16px;
        border-radius: 6px;
        cursor: pointer;
        transition: background 0.3s;">    
        <a href="/LABORATORIO2/crud/citas/generar-excel.php" style=" color: white;text-decoration: none;">Exportar a Excel</a>  
        </div>
        <button class="btn-insertar-cita">Insertar</button>
    <?php endif; ?>
</div>
<br>

<?php if (mysqli_num_rows($result) === 0): ?>
    <p>No hay citas registradas dentro del año actual o del mes permitido.</p>
<?php else: ?>
    <table class="citas-table">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
                <th>Motivo</th>
                <th>Médico</th>
                <th>Paciente</th>
                <?php if ($isAdmin): ?>
                    <th>Acciones</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php while ($fila = mysqli_fetch_assoc($result)):
                // Determinar clase CSS según estado
                $clase_estado = '';
                switch(strtolower($fila['estado'])) {
                    case 'pendiente':
                        $clase_estado = 'estado-pendiente';
                        break;
                    case 'confirmada':
                        $clase_estado = 'estado-confirmada';
                        break;
                    case 'atendida':
                        $clase_estado = 'estado-atendida';
                        break;
                    case 'siendo atendida':
                        $clase_estado = 'estado-en-progreso';
                        break;
                    default:
                        $clase_estado = '';
                }
            ?>
                <tr>
                    <td><?= $fila['fecha_cita'] ?></td>
                    <td><?= date('H:i', strtotime($fila['hora_cita'])) ?></td>
                    <td class="<?= $clase_estado ?>"><?= htmlspecialchars($fila['estado']) ?></td>
                    <td><?= htmlspecialchars($fila['motivo']) ?></td>
                    <td><?= htmlspecialchars($fila['nombre_medico']) ?> - <?= htmlspecialchars($fila['especialidad_medico']) ?></td>
                    <td><?= htmlspecialchars($fila['nombre_paciente']) ?></td>
                    <?php if ($isAdmin): ?>
                        <td>
                            <button class="btn-editar-cita" data-id="<?= $fila['id'] ?>">Editar</button>
                            <button class="btn-eliminar-cita" data-id="<?= $fila['id'] ?>">Eliminar</button>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php endif; ?>

<div id="modal-container" class="modal-container" style="display:none;"></div>
<script src="../../js/script.js"></script>
</body>
</html>

<?php mysqli_close($con); ?>
