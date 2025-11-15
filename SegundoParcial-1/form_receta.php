<?php
include("conexion.php");

$sql = "SELECT * FROM tiporeceta";
$result = mysqli_query($con, $sql);
?>
<form action="javascript:insertarReceta()" method="post" id="form-insert-receta">
    <label for="titulo">Titulo</label>
    <input type="text" name="titulo">
    <br>
    <label for="idtiporeceta">Tipo:</label>
    <select name="idtiporeceta" id="idtiporeceta">
        <option value="">Seleccionar</option>
        <?php while($row = $result->fetch_assoc()) { ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['tiporeceta']; ?></option>
        <?php }; ?>
    </select>
    <br>
    <label for="preparacion">preparacion:</label>
    <input type="text" name="preparacion">
    <br>
    <label for="fotografia">imagen</label>
    <input type="text" name="fotografia">
    <br>
    <button type="submit">Guardar</button>
</form>