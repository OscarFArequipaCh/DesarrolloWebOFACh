<?php
function convertirTemperatura($valor, $unidad) {
    switch ($unidad) {
        case 'C':
            $celsius = $valor;
            $fahrenheit = ($celsius * 9/5) + 32;
            $kelvin = $celsius + 273.15;
            break;
        case 'F':
            $fahrenheit = $valor;
            $celsius = ($fahrenheit - 32) * 5/9;
            $kelvin = $celsius + 273.15;
            break;
        case 'K':
            $kelvin = $valor;
            $celsius = $kelvin - 273.15;
            $fahrenheit = ($celsius * 9/5) + 32;
            break;
        default:
            return null;
    }
    return [
        'Celsius' => round($celsius, 2) . " °C",
        'Fahrenheit' => round($fahrenheit, 2) . " °F",
        'Kelvin' => round($kelvin, 2) . " K"
    ];
}

if (isset($_POST['temperatura']) && isset($_POST['unidad'])) {
    $temperatura = floatval($_POST['temperatura']);
    $unidad = $_POST['unidad'];

    $conversiones = convertirTemperatura($temperatura, $unidad);
} else {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de Conversión</title>
    <link rel="stylesheet" href="stylesconvercion.css"/>
</head>
<body>
    <h1>Resultados de la Conversión</h1>
    <table>
        <tr>
            <th>Unidad</th>
            <th>Valor</th>
        </tr>
        <?php foreach ($conversiones as $unidad => $valor): ?>
            <tr>
                <td><?php echo $unidad; ?></td>
                <td><?php echo $valor; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="index.html"><button>Volver</button></a>
</body>
</html>
