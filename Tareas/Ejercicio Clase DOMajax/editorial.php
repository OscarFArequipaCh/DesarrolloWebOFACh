<?php include("conexion.php");

$sql="SELECT id,editorial  FROM editoriales";

$resultado=$con->query($sql);

while($row=mysqli_fetch_array($resultado)){
    ?>
    <option value="<?php echo $row['id'] ?>"> <?php echo $row['editorial'];?></option>
    
    <?php } ?>	