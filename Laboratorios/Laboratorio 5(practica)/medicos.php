<?php
include("conexion.php");

$sql = "SELECT * FROM medicos ORDER BY nombre ASC";
$result = mysqli_query($con, $sql);
?>
<div>
    <button id="btn-insert-medico" onclick="CargarFormulario('form-insert-medico.html')">Insertar</button>
</div>
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Especialidad</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Operaciones</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['especialidad']; ?></td>
            <td><?php  echo $row['telefono']; ?></td>
            <td><?php echo $row['correo']; ?></td>
            <td>
                <button onclick="formEditMedico(<?php echo $row['id']; ?>)">Editar</button>
                <button onclick="deleteMedico(<?php echo $row['id']; ?>)">Eliminar</button>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>