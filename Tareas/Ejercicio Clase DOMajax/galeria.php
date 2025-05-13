<?php
include_once("conexion.php");


$sql = "SELECT imagen FROM libros";
$res = $con->query($sql);

echo "<table>";
$count = 0;
while ($row = $res->fetch_assoc()) {
    if ($count % 3 == 0) echo "<tr>";
    echo "<td>
        <img src='imagen/{$row['imagen']}' width='50' height='75' 
        style='cursor:pointer' onclick='mostrarModal(\"imagen/{$row['imagen']}\")'>
    </td>";
    $count++;
    if ($count % 3 == 0) echo "</tr>";
}
if ($count % 3 != 0) echo "</tr>"; 
echo "</table>";

$con->close();
?>