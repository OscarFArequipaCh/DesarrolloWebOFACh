<?php
include("conexion.php");

$id=$_GET['id'];

$sql = "SELECT * FROM medicos WHERE id=$id";
$result = mysqli_query($con, $sql);

$row = mysqli_fetch_assoc($result);
?>
<form action="javascript:editMedico()" id="form-edit-medico" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="<?php echo $row['nombre']; ?>">
    <label for="especialidad">Especialidad:</label>
    <input type="text" name="especialidad" id="especialidad" value="<?php echo $row['especialidad']; ?>">
    <label for="telefono">Telefono:</label>
    <input type="text" name="telefono" id="telefono" value="<?php echo $row['telefono']; ?>">
    <label for="correo">Correo Eletronico:</label>
    <input type="email" name="correo" id="correo" value="<?php echo $row['correo']; ?>">

    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <button id="edit-medico">Guardar</button>
</form>