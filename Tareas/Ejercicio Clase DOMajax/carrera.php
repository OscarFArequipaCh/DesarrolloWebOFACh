<?php include("conexion.php");

$sql = "SELECT id, carrera FROM carreras";
$resultado = $con->query($sql);

while($row = mysqli_fetch_array($resultado)) {
    echo "<option value='{$row['id']}'>{$row['carrera']}</option>";
}
?>
