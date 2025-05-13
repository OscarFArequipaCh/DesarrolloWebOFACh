<?php include("conexion.php");

$sql = "SELECT id, nombrecompleto FROM usuarios";
$resultado = $con->query($sql);

while($row = mysqli_fetch_array($resultado)) {
    echo "<option value='{$row['id']}'>{$row['nombrecompleto']}</option>";
}
?>