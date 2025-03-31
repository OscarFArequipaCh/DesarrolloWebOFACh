<?php
include("conexion.php");

$columna = isset($_GET['columna']) ? $_GET['columna'] : 'id';
$orden = isset($_GET['orden']) ? $_GET['orden'] : 'ASC';

$nuevo_orden = ($orden === 'ASC') ? 'DESC' : 'ASC';

$columnas_permitidas = ['nombres', 'apellidos', 'correo'];
if (!in_array($columna, $columnas_permitidas)) {
    $columna = 'id';
}
$sql="SELECT id,nombres,apellidos,correo FROM usuarios ORDER BY $columna $orden";
$resultado=$con->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Tabla</title>
    <link rel="stylesheet" href="stylestabla.css">
</head>
<body>
    <table>
        <thead>
            <tr>
                <th width="100px"><a href="?columna=nombres&orden=<?php echo $nuevo_orden; ?>">Nombres</a></th>
                <th width="100px"><a href="?columna=apellidos&orden=<?php echo $nuevo_orden; ?>">Apellidos</a></th>
                <th width="150px"><a href="?columna=correo&orden=<?php echo $nuevo_orden; ?>">Correo</a></th>
            </tr>
        </thead>
        <?php 
        while($row=mysqli_fetch_array($resultado)){
        ?>
        <tr>
            <td><?php echo $row['nombres'];?></td>
            <td><?php echo $row['apellidos'];?></td>
            <td><a href="form_editar_correo.php?id=<?php echo $row['id'];?>"><?php echo $row['correo'];?></a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>