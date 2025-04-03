<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylesformulario.css">
</head>
<body>
    <?php
    include("conexion.php");
    $sql = "SELECT codigo,nombre from carreras order by nombre";
    $result = mysqli_query($con, $sql);

    $cantidad=$_POST['usuarios'];
    ?>
    <div class="container">
        <form action="introducir.php" method="post" enctype="multipart/form-data">
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Fotografía</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>CU</th>
                        <th>Sexo</th>
                        <th>Carrera</th>
                    </tr>
                </thead>
                <?php 
                for($i=0; $i<$cantidad; $i++) {
                ?>
                <tr>
                    <td><?php echo $i+1; ?></td>   
                    <td>
                        <label for="fileInput<?php echo $i; ?>" class="custom-file-upload">Seleccionar</label>
                        <input type="file" name="fotografia[]" id="fileInput<?php echo $i; ?>" accept="image/*" required>
                    </td>
                    <td><input type="text" name="nombres[]"></td>   
                    <td><input type="text" name="apellidos[]"></td>
                    <td><input type="text" name="cu[]"></td>     
                    <td><input type="radio" name="sexo[<?php echo $i; ?>]" value="Masculino" required>Masculino
                    <input type="radio" name="sexo[<?php echo $i; ?>]" value="Femenino">Femenino</td>     
                    <td><select name="codigo_carrera[]" required>
                        <?php 
                        mysqli_data_seek($result, 0);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <option value="<?php echo $row['codigo']; ?>"><?php echo $row['nombre']; ?></option>
                        <?php } ?>
                    </select></td>
                </tr>
                <?php }?>
            </table> 
            <button type="submit" value="Enviar">Enviar</button>
            <button type="reset" value="Borrar">Borrar</button>
        </form>
    </div>
</body>
</html>