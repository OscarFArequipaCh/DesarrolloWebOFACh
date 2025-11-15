<?php
include("conexion.php");

$sqlm = "SELECT id, nombre, especialidad FROM medicos";
$sqlp = "SELECT id, nombre FROM pacientes";
$rmedicos = mysqli_query($con, $sqlm);
$rpacientes = mysqli_query($con, $sqlp)
?>
<form action="javascript:insertCita()" id="form-insert-cita" method="post">
    <label for="fecha_cita">Fecha:</label>
    <input type="date" name="fecha_cita" id="fecha_cita">
    <label for="hora_cita">Hora:</label>
    <input type="time" name="hora_cita" id="hora_cita">
    <label for="estado">Estado:</label>
    <select name="estado" id="estado">
        <option value="">Seleccionar</option>
        <option value="Pendiente">Pendiente</option>
        <option value="Atendida">Atendida</option>
        <option value="Cancelada">Cancelada</option>
    </select>
    <label for="motivo">Motivo:</label>
    <input type="text" name="motivo" id="motivo">

    <label for="id_medico">Medico:</label>
    <select name="id_medico" id="id_medico">
        <option value="">Seleccionar</option>
        <?php while($rowm = mysqli_fetch_assoc($rmedicos)) { ?>
        <option value="<?php echo $rowm['id']; ?>"><?php echo $rowm['nombre']."-".$rowm['especialidad']; ?></option>
        <?php } ?>
    </select>

    <label for="id_paciente">Paciente:</label>
    <select name="id_paciente" id="id_paciente">
        <option value="">Seleccionar</option>
        <?php while($rowp = mysqli_fetch_assoc($rpacientes)) { ?>
        <option value="<?php echo $rowp['id']; ?>"><?php echo $rowp['nombre']; ?></option>
        <?php } ?>
    </select>
    
    <button id="insert-cita">Guardar</button>
</form>