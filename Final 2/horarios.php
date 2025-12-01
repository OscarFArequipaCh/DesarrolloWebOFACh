<?php
//$materia = $_GET["materia"];

include("conexion.php");
$sql = "SELECT materia, dia, hora FROM horarios WHERE materia=SIS256";
$resultado = mysqli_query($con, $sql);

?>

<table style="border: 1px;">
    <thead>
        <tr>
            <th>Hora</th>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miercoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i=8; $i<18; $i++) { ?> 
        <tr>
            <td><?php echo $i."-".$i+1; ?></td>
            <td></td>
        </tr>
        <?php } ?>
    </tbody>
</table>