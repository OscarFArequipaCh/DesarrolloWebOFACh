<?php
include("conexion.php");

$id = $_GET['id'];

$sqlc = "SELECT * FROM citas WHERE id = $id";
$rcitas = mysqli_query($con, $sqlc);
$rowc = mysqli_fetch_assoc($rcitas);

$sqlm = "SELECT id, nombre, especialidad FROM medicos";
$sqlp = "SELECT id, nombre FROM pacientes";
$rmedicos = mysqli_query($con, $sqlm);
$rpacientes = mysqli_query($con, $sqlp)
?>
<form action="javascript:editCita()" id="form-edit-cita" method="post">
    <label for="fecha_cita">Fecha:</label>
    <input type="date" name="fecha_cita" id="fecha_cita" value="<?php echo $rowc['fecha_cita']; ?>">
    <label for="hora_cita">Hora:</label>
    <input type="time" name="hora_cita" id="hora_cita" value="<?php echo $rowc['hora_cita']; ?>">
    <label for="estado">Estado:</label>
    <select name="estado" id="estado">
        <option value="">Seleccionar</option>
        <option value="Pendiente" <?php echo $rowc['estado'] == 'Pendiente' ? "selected" : ""; ?>>Pendiente</option>
        <option value="Atendida" <?php echo $rowc['estado'] == 'Atendida' ? "selected" : ""; ?>>Atendida</option>
        <option value="Cancelada" <?php echo $rowc['estado'] == 'Cancelada' ? "selected" : ""; ?>>Cancelada</option>
    </select>
    <label for="motivo">Motivo:</label>
    <input type="text" name="motivo" id="motivo" value="<?php echo $rowc['motivo']; ?>">

    <label for="id_medico">Medico:</label>
    <select name="id_medico" id="id_medico">
        <option value="">Seleccionar</option>
        <?php while($rowm = mysqli_fetch_assoc($rmedicos)) { ?>
        <option value="<?php echo $rowm['id']; ?>" <?php echo $rowc['id_medico'] == $rowm['id'] ? "selected" : ""; ?>><?php echo $rowm['nombre']."-".$rowm['especialidad']; ?></option>
        <?php } ?>
    </select>

    <label for="id_paciente">Paciente:</label>
    <select name="id_paciente" id="id_paciente">
        <option value="">Seleccionar</option>
        <?php while($rowp = mysqli_fetch_assoc($rpacientes)) { ?>
        <option value="<?php echo $rowp['id']; ?>" <?php echo $rowc['id_paciente'] == $rowp['id'] ? "selected" : ""; ?>><?php echo $rowp['nombre']; ?></option>
        <?php } ?>
    </select>
    
    <input type="hidden" value="<?php echo $id; ?>" name="id">
    <button id="edit-cita">Guardar</button>
    <button onclick="cerrarModal(CargarCitas())">Cerrar</button>
</form>