<?php
session_start();

include("../authentication/conexion.php");
$medicos = $con->query("SELECT * FROM medicos");
$pacientes = $con->query("SELECT * FROM pacientes");
?>

<h2>Médicos</h2>
<table border="1">
<tr><th>Nombre</th><th>Especialidad</th><th>Teléfono</th><th>Correo</th><th>Acciones</th></tr>
<?php while($m = $medicos->fetch_assoc()): ?>
<tr>
<td><?=$m['nombre']?></td>
<td><?=$m['especialidad']?></td>
<td><?=$m['telefono']?></td>
<td><?=$m['correo']?></td>
<td>
<button onclick="editar('medico',<?= $m['id'] ?>)">Editar</button>
<button onclick="eliminar('medico',<?= $m['id'] ?>)">Eliminar</button>
</td>
</tr>
<?php endwhile; ?>
</table>

<h2>Pacientes</h2>
<table border="1">
<tr><th>Nombre</th><th>Documento</th><th>Teléfono</th><th>Correo</th><th>Acciones</th></tr>
<?php while($p = $pacientes->fetch_assoc()): ?>
<tr>
<td><?=$p['nombre']?></td>
<td><?=$p['documento']?></td>
<td><?=$p['telefono']?></td>
<td><?=$p['correo']?></td>
<td>
<button onclick="editar('paciente',<?= $p['id'] ?>)">Editar</button>
<button onclick="eliminar('paciente',<?= $p['id'] ?>)">Eliminar</button>
</td>
</tr>
<?php endwhile; ?>
</table>

