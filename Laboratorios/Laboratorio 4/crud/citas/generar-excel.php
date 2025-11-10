<?php
session_start();
include("../../authentication/conexion.php");

// Verificar sesión
if (!isset($_SESSION['rol'])) {
    echo "<div style='padding:16px;color:#a00;'>Debes iniciar sesión para exportar las citas.</div>";
    exit();
}

$isAdmin = ($_SESSION['rol'] === 'admin');

// Fecha límite: 1 mes desde hoy
$hoy = date('Y-m-d');
$fin_mes = date('Y-m-d', strtotime('+1 month'));
$anio_actual = date('Y');

// Misma consulta que en citas.php
$sql = "SELECT c.id, c.fecha_cita, c.hora_cita, c.estado, c.motivo,
        p.nombre AS nombre_paciente,
        m.nombre AS nombre_medico, m.especialidad AS especialidad_medico
        FROM citas c
        JOIN pacientes p ON c.id_paciente = p.id
        JOIN medicos m ON c.id_medico = m.id
        WHERE YEAR(c.fecha_cita) = '$anio_actual' AND c.fecha_cita <= '$fin_mes'
        ORDER BY c.fecha_cita ASC, c.hora_cita ASC";

$result = mysqli_query($con, $sql);


header("Content-Type: application/vnd.ms-excel; charset=UTF-1");
header("Content-Disposition: attachment; filename=citas-medicas.xls");

?>
<table class="citas-table" border="1">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
                <th>Motivo</th>
                <th>Médico</th>
                <th>Especialidad</th>
                <th>Paciente</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && mysqli_num_rows($result) > 0): ?>
                <?php while ($fila = mysqli_fetch_assoc($result)):
                    // Determinar clase CSS según estado (no relevante en Excel, pero mantenido por claridad)
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
                        <td><?= htmlspecialchars($fila['fecha_cita']) ?></td>
                        <td><?= htmlspecialchars(date('H:i', strtotime($fila['hora_cita']))) ?></td>
                        <td><?= htmlspecialchars($fila['estado']) ?></td>
                        <td><?= htmlspecialchars($fila['motivo']) ?></td>
                        <td><?= htmlspecialchars($fila['nombre_medico']) ?></td>
                        <td><?= htmlspecialchars($fila['especialidad_medico']) ?></td>
                        <td><?= htmlspecialchars($fila['nombre_paciente']) ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="7">No hay citas dentro del periodo seleccionado.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

<?php mysqli_close($con); ?>
