<?php
include("conexion.php");

if(isset($_GET['idtiporeceta'])){
    $idtipo = $_GET['idtiporeceta'];
    $sqlr = "SELECT r.id, r.fotografia, r.titulo, r.preparacion, t.tiporeceta 
        FROM recetas r 
        INNER JOIN tiporeceta t 
        ON r.idtiporeceta=t.id
        WHERE r.idtiporeceta = $idtipo";
$resultreceta = mysqli_query($con, $sqlr);
}

$sqlt = "SELECT * FROM tiporeceta";
$resultipo = mysqli_query($con, $sqlt);

?>

<label for="idtiporeceta">Tipo:</label>
<select name="idtiporeceta" id="idtiporeceta">
    <option value="">Seleccionar</option>
    <?php while($rowt = $resultipo->fetch_assoc()) { ?>
        <option value="<?php echo $rowt['id']; ?>" <?php if(isset($_GET['idtiporeceta'])){ echo $rowt['id'] == $idtipo ? "selected" : ""; } ?>>
            <?php echo $rowt['tiporeceta']; ?>
        </option>
    <?php }; ?>
</select>
<button onclick="filtrar()">Filtrar</button>

<?php if(isset($_GET['idtiporeceta'])){ ?>
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
        <?php while($rowr = $resultreceta->fetch_assoc()) { ?>
        <tr>
            <td><img src="images/<?php echo $rowr['fotografia']; ?>" id="<?php echo $rowr['id']; ?>" width="80px"></td>
            <td><?php echo $rowr['titulo']; ?></td>
            <td><?php echo $rowr['preparacion']; ?></td>
            <td><?php echo $rowr['tiporeceta']?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php } ?>