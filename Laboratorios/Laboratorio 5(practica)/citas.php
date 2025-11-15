<?php
include("conexion.php");

$sql = "SELECT c.id, c.fecha_cita, c.hora_cita, c.estado, c.motivo,
        p.nombre AS nombre_paciente,
        m.nombre AS nombre_medico, 
        m.especialidad AS especialidad_medico
        FROM citas c
        JOIN pacientes p ON c.id_paciente = p.id
        JOIN medicos m ON c.id_medico = m.id
        ORDER BY c.fecha_cita ASC, c.hora_cita ASC";
$result = mysqli_query($con, $sql);

?>
<div>
    <button id="btn-insert-cita" onclick="CargarFormulario('form-insert-cita.php')">Insertar</button>
</div>
<table>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Estado</th>
            <th>Motivo</th>
            <th>Medico</th>
            <th>Paciente</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['fecha_cita']; ?></td>
            <td><?php echo $row['hora_cita']; ?></td>
            <td><?php echo $row['estado']; ?></td>
            <td><?php echo $row['motivo']; ?></td>
            <td><?php echo $row['nombre_paciente']; ?></td>
            <td><?php echo $row['nombre_medico'] . " - " . $row['especialidad_medico'] ?></td>
            <td>
                <button onclick="formEditCita(<?php echo $row['id']; ?>)">Editar</button>
                <button onclick="deleteCita(<?php echo $row['id']; ?>)">Eliminar</button>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>