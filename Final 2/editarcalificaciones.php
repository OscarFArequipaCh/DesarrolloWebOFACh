<?php
//$materia = $_GET["materia"];

include("conexion.php");
$sql = "SELECT * FROM alumnos";
$resultado = mysqli_query($con, $sql);
?>

<table>
    <thead>
        <tr>
            <th>Nro</th>
            <th>Nombre y Apellidos</th>
            <th>calificacion</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = mysqli_fetch_assoc($resultado)){ ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nombres_apellidos']; ?></td>
            <td><form action="javascript:actualizarCalificacion()" method="post">
                <input type="number" id="<?php echo $row['id']; ?>" value="<?php echo $row['calificacion']; ?>">
                <button type="submit">actualizar</button>
            </form></td>
        </tr>
        <?php } ?>
    </tbody>
</table>