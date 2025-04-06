<?php session_start();

require("verificarsesion.php");

include("conexion.php");
$sql="SELECT id,producto,precio,imagen FROM productos";

$resultado=$con->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planilla Personas</title>
    <link rel="stylesheet" href="stylestable.css">
</head>
<body>
    <div class="container">
        
        <nav class="sidebar">
            <h2>Menú</h2>
            <a href="cerrarsesion.php">Cerrar Sesion</a>
        </nav>
        
        <div class="content">
            <table>
            <thead>
                <tr>
                    <th width="100px">Productos</th>
                    <th width="100px">Precios</th>
                    <th width="100px">imagen</th>
                </tr>
            </thead>
            <?php 
            while($row=mysqli_fetch_array($resultado)){
            ?>
                <tr>
                    <td><?php echo $row['producto'];?></td>
                    <td><?php echo $row['precio'];?></td>
                    <td><img src="images/<?php echo $row['imagen']; ?>" width="100px"></td>
                    <?php if($_SESSION['nivel']==1){?>
                    <td><a href="editarproducto.php?id=<?php echo $row['id'];?>">Editar</a>  <a href="eliminarproducto.php?id=<?php echo $row['id'];?>">Eliminar</a> </td>
                    <?php } ?>
                </tr>
            <?php } ?>
            </table>
            <?php if($_SESSION['nivel']==1){?>
            <a href="insertarproducto.php"> Insertar</a>
            <?php } ?>
        </div>
    </div>
    
</body>
</html>


 