<?php
function sumarDigitos($num) {
    $suma = array_sum(str_split($num));
    return $suma;
}

if (isset($_POST['numero'])) {
    $numero = intval($_POST['numero']);
    $resultado = sumarDigitos($numero);
} else {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="stylesdigitos.css"/>
</head>
<body>
    <div class="container">
        <h2>Resultado de la Suma</h2>
        <table>
            <tr>
                <th>Número</th>
                <th>Suma de Dígitos</th>
            </tr>
            <tr>
                <td><?php echo $numero; ?></td>
                <td><?php echo $resultado; ?></td>
            </tr>
        </table>
        <br>
        <a href="index.html"><button>Volver</button></a>
    </div>
</body>
</html>
