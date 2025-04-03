<?php 

include("conexion.php");
$sql="SELECT id,fotografia, nombres,apellidos,cu,sexo,carreras.nombre as carreras FROM alumnos
      LEFT JOIN carreras ON alumnos.codigo_carrera=carreras.codigo";  

$resultado=$con->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylestabla.css">
</head>
<body>
    <table>
        <thead>
            <tr>
                <th width="50px">Numero</th>
                <th width="100px">Fotografia</th>
                <th width="150px">Nombres</th>
                <th width="150px">Apellidos</th>
                <th width="60px">CU</th>
                <th width="20px">Sexo</th>
                <th width="300px">Carrera</th>
            </tr>
        </thead>
        <?php 
        while($row=mysqli_fetch_array($resultado)){
        ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><img src="images/<?php echo $row['fotografia'];  ?>" width="100px"></td>
            <td><?php echo $row['nombres'];?></td>
            <td><?php echo $row['apellidos'];?></td>
            <td><?php echo $row['cu'];?></td>
            <td><?php echo $row['sexo'];?></td>
            <td><?php echo $row['carreras'];?></td>
        </tr>
        <?php } ?>
    </table>
    <a href="fintroduccion.html"> Insertar</a>
</body>
</html>