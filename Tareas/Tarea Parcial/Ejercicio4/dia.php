<?php
$dia=$_GET['numero'];
switch ($dia) {
    case 1:
        $diaseleccionado="Lunes";
        break;
    case 2:
        $diaseleccionado="Martes";
        break;
    case 3:
        $diaseleccionado="Miércoles";
        break; 
    case 4:         
        $diaseleccionado="Jueves";
        break;
    case 5:
        $diaseleccionado="Viernes";
        break;
    case 6:
        $diaseleccionado="Sábado";
        break;
    case 7:
        $diaseleccionado="Domingo";
        break;
    default:
        echo "Número no válido";
        header("Location: index.html");
        exit;
        break;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>seleccionar dias</title>
</head>
<body>
    <select name="dias" id="dias" default="<?php echo "$diaseleccionado"?>">
        <option value="Lunes" <?php if($diaseleccionado=="Lunes"){ ?>disabled selected <?php }?>>Lunes</option>
        <option value="Martes" <?php if($diaseleccionado=="Martes"){ ?>disabled selected <?php }?>>Martes</option>
        <option value="Miércoles" <?php if($diaseleccionado=="Miércoles"){ ?>disabled selected <?php }?>>Miércoles</option>
        <option value="Jueves" <?php if($diaseleccionado=="Jueves"){ ?>disabled selected <?php }?>>Jueves</option>
        <option value="Viernes" <?php if($diaseleccionado=="Viernes"){ ?>disabled selected <?php }?>>Viernes</option>
        <option value="Sábado" <?php if($diaseleccionado=="Sábado"){ ?>disabled selected <?php }?>>Sábado</option>
        <option value="Domingo" <?php if($diaseleccionado=="Domingo"){ ?>disabled selected <?php }?>>Domingo</option>
    </select>
</body>
</html>