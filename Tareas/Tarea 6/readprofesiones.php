<?php session_start();

require("verificarsesion.php");

include("conexion.php");
$sql="SELECT id,nombre FROM profesiones";

$resultado=$con->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>planilla de profesiones</title>
    <link rel="stylesheet" href="stylestabla.css">
</head>
<body>
    <div class="container">
        
        <nav class="sidebar">
            <h2>Menú</h2>
            <a href="read.php">Personas</a>
            <a href="readprofesiones.php">Profesiones</a>
            <a href="readusuarios.php">Usuarios</a>
            <a href="cerrar.php">Cerrar Sesion</a>
        </nav>

        <div class="content">
            <table>
                <thead>
                    <tr>
                        <th width="100px">Nombres</th>
                        <?php if($_SESSION['nivel']==1){?>
                        <th>Operaciones</th>
                        <?php } ?>
                    </tr>
                </thead>
                
            <?php 
            while($row=mysqli_fetch_array($resultado)){
            ?>
                <tr>
                    <td><?php echo $row['nombre'];?></td>
                    <?php  if($_SESSION['nivel']==1){?>
                    <td><a href="formeditarprofesion.php?id=<?php echo $row['id'];?>">Editar</a>  <a href="deleteprofesiones.php?id=<?php echo $row['id'];?>">Eliminar</a> </td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </table>
            <?php  if($_SESSION['nivel']==1){?>
            <a href="forminsertarprofesiones.php"> Insertar</a>
            <?php } ?>
        </div>
    </div>
</body>
</html>

 