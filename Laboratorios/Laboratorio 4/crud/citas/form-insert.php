<?php
include("../../authentication/conexion.php");

// obtener médicos y pacientes
$medicos = mysqli_query($con, "SELECT id, nombre, especialidad FROM medicos ORDER BY nombre ASC");
$pacientes = mysqli_query($con, "SELECT id, nombre FROM pacientes ORDER BY nombre ASC");
?>

<div class="modal">
  <h3>Registrar Cita Médica</h3>
  <form id="form-insertar-cita">
    
    <label>Paciente:</label>
    <select name="id_paciente" required>
      <option value="">Seleccione un paciente</option>
      <?php while ($p = mysqli_fetch_assoc($pacientes)) { ?>
        <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['nombre']) ?></option>
      <?php } ?>
    </select>

    <label>Médico:</label>
    <select name="id_medico" required>
      <option value="">Seleccione un médico</option>
      <?php while ($m = mysqli_fetch_assoc($medicos)) { ?>
        <option value="<?= $m['id'] ?>"><?= htmlspecialchars($m['nombre'] . " - " . $m['especialidad']) ?></option>
      <?php } ?>
    </select>

    <label>Fecha de Cita:</label>
    <input type="date" name="fecha_cita" required>

    <label>Hora de Cita:</label>
    <input type="time" name="hora_cita" required>

    <label>Motivo:</label>
    <textarea name="motivo" required></textarea>

    <label>Estado:</label>
    <select name="estado" required>
      <option value="Pendiente">Pendiente</option>
      <option value="Atendida">Atendida</option>
      <option value="Cancelada">Cancelada</option>
    </select>

    <div class="botones">
      <button type="submit">Guardar</button>
      <button type="button" onclick="cerrarModalCRUD()">Cancelar</button>
    </div>
  </form>
</div>
