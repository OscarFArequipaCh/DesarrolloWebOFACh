<?php
function esPrimo($num) {
    if ($num < 2) return false;
    for ($i = 2; $i * $i <= $num; $i++) {
        if ($num % $i == 0) return false;
    }
    return true;
}

function generarPrimos($cantidad) {
    $primos = [];
    $num = 2;
    while (count($primos) < $cantidad) {
        if (esPrimo($num)) {
            $primos[] = $num;
        }
        $num++;
    }
    return $primos;
}

if (isset($_GET['cantidad']) && is_numeric($_GET['cantidad'])) {
    $cantidad = (int)$_GET['cantidad'];
    $primos = generarPrimos($cantidad);
} else {
    $primos = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Primos</title>
    <link rel="stylesheet" href="stylesp3.css"/>
</head>
<body>
    <h2>Números Primos Generados</h2>
    <div class="lista-primos">
        <ol>
            <?php foreach ($primos as $primo) { echo "<li>$primo</li>"; } ?>
        </ol>
    </div>
    <br><br>
    <a href="index.html"><button>Volver</button></a>
</body>
</html>