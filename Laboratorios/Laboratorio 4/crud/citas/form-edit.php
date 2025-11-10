<?php
include("../../authentication/conexion.php");

if (!isset($_GET['id'])) {
  http_response_code(400);
  echo "ID requerido";
  exit;
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM citas WHERE id = $id LIMIT 1";
$res = mysqli_query($con, $sql);
$cita = mysqli_fetch_assoc($res);

if (!$cita) {
  http_response_code(404);
  echo "Cita no encontrada";
  exit;
}

// obtener médicos y pacientes
$medicos = mysqli_query($con, "SELECT id, nombre, especialidad FROM medicos ORDER BY nombre ASC");
$pacientes = mysqli_query($con, "SELECT id, nombre FROM pacientes ORDER BY nombre ASC");
?>

<div class="modal">
  <h3>Editar Cita Médica</h3>
  <form id="form-editar-cita">
    <input type="hidden" name="id" value="<?= $cita['id'] ?>">

    <label>Paciente:</label>
    <select name="id_paciente" required>
      <option value="">Seleccione un paciente</option>
      <?php while ($p = mysqli_fetch_assoc($pacientes)) { ?>
        <option value="<?= $p['id'] ?>" <?= $p['id'] == $cita['id_paciente'] ? 'selected' : '' ?>>
          <?= htmlspecialchars($p['nombre']) ?>
        </option>
      <?php } ?>
    </select>

    <label>Médico:</label>
    <select name="id_medico" required>
      <option value="">Seleccione un médico</option>
      <?php while ($m = mysqli_fetch_assoc($medicos)) { ?>
        <option value="<?= $m['id'] ?>" <?= $m['id'] == $cita['id_medico'] ? 'selected' : '' ?>>
          <?= htmlspecialchars($m['nombre'] . " - " . $m['especialidad']) ?>
        </option>
      <?php } ?>
    </select>

    <label>Fecha de Cita:</label>
    <input type="date" name="fecha_cita" value="<?= $cita['fecha_cita'] ?>" required>

    <label>Hora de Cita:</label>
    <input type="time" name="hora_cita" value="<?= $cita['hora_cita'] ?>" required>

    <label>Motivo:</label>
    <textarea name="motivo" required><?= htmlspecialchars($cita['motivo']) ?></textarea>

    <label>Estado:</label>
    <select name="estado" required>
      <option value="Pendiente" <?= $cita['estado'] == 'Pendiente' ? 'selected' : '' ?>>Pendiente</option>
      <option value="Atendida" <?= $cita['estado'] == 'Atendida' ? 'selected' : '' ?>>Atendida</option>
      <option value="Cancelada" <?= $cita['estado'] == 'Cancelada' ? 'selected' : '' ?>>Cancelada</option>
    </select>

    <div class="botones">
      <button type="submit">Actualizar</button>
      <button type="button" onclick="cerrarModalCRUD()">Cancelar</button>
    </div>
  </form>
</div>
