<?php
include("conexion.php");

$sql = "SELECT * FROM pacientes ORDER BY nombre ASC";
$result = mysqli_query($con, $sql);
?>
<div>
    <button id="btn-insert-paciente">Insertar</button>
</div>
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Documento</th>
            <th>Telefono</th>
            <th>Correo</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['documento']; ?></td>
            <td><?php echo $row['telefono']; ?></td>
            <td><?php echo $row['correo']; ?></td>
            <td>
                <button onclick="formEditPaciente(<?php echo $row['id']; ?>)">Editar</button>
                <button onclick="deletePaciente(<?php echo $row['id']; ?>)">Eliminar</button>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>