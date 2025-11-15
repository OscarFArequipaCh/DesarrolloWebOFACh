<?php
include("conexion.php");

$sql = "SELECT r.id, r.fotografia, r.titulo, r.preparacion, t.tiporeceta 
        FROM recetas r 
        INNER JOIN tiporeceta t 
        ON r.idtiporeceta=t.id";
$result = mysqli_query($con, $sql);
?>

<table>
    <thead>
        <th>
            <td>Fotografia</td>
            <td>titulo</td>
            <td>preparacion</td>
            <td>Tipo</td>
        </th>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><img src="images/<?php echo $row['fotografia']; ?>" id="<?php echo $row['id']; ?>" alt="images/<?php echo $row['fotografia']; ?>" width="80px" onclick="modal(<?php echo $row['id']; ?>)"></td>
            <td><?php echo $row['titulo']; ?></td>
            <td><?php echo $row['preparacion']; ?></td>
            <td><?php echo $row['tiporeceta']?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>