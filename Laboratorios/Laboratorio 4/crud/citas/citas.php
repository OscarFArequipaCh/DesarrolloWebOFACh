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
    background-color: #ffeb99;
    color: #664d00;
    font-weight: bold;
}
.estado-confirmada {
    background-color: #b3ffb3;
    color: #004d00;
    font-weight: bold;
}
.estado-atendida {
    background-color: #4da6ff;
    color: #fff;
    font-weight: bold;
}
@keyframes parpadeo {
    0% {opacity: 1;}
    50% {opacity: 0.3;}
    100% {opacity: 1;}
}
.estado-en-progreso {
    background-color: #ff6666;
    color: #fff;
    font-weight: bold;
    animation: parpadeo 1s infinite;
}
/* Estilos del buscador */
.search-container {
    margin: 20px 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.search-input {
    width: 100%;
    max-width: 500px;
    padding: 10px;
    border: 2px solid #ddd;
    border-radius: 6px;
    font-size: 16px;
    transition: border-color 0.3s;
}
.search-input:focus {
    outline: none;
    border-color: #0d6efd;
    box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.15);
}
</style>
</head>
<body>

<div class="citas-header">
    <h2>Citas Médicas</h2>
    <?php if ($isAdmin): ?>
        <button class="btn-insertar-cita">Insertar</button>
    <?php endif; ?>
</div>

<!-- Buscador -->
<div class="search-container">
    <input type="text" id="searchInput" placeholder="Buscar por paciente, médico, motivo o estado..." class="search-input">
</div>

<br>
<?php if ($isAdmin): ?>
<div style="background-color: #129e4f;
  width: 150px;
  padding: 10px 16px;
  border-radius: 6px;
  cursor: pointer;
  transition: background 0.3s;">    
<a href="/LABORATORIO2/crud/citas/generar-excel.php" style="color: white;text-decoration: none;">Exportar a Excel</a>  
</div>
<?php endif; ?>

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

<!-- Script del buscador -->
<script>
document.getElementById('searchInput').addEventListener('keyup', function() {
    const searchValue = this.value.toLowerCase();
    const tabla = document.querySelector('.citas-table');
    const filas = tabla.getElementsByTagName('tr');

    for (let i = 1; i < filas.length; i++) {
        const fila = filas[i];
        const texto = fila.textContent.toLowerCase();
        if (texto.includes(searchValue)) {
            fila.style.display = '';
        } else {
            fila.style.display = 'none';
        }
    }
});
</script>

</body>
</html>

<?php mysqli_close($con); ?>