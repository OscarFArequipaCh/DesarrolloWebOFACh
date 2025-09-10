<?php
function ordenarPalabras($palabras) {
    sort($palabras, SORT_STRING | SORT_FLAG_CASE);
    return $palabras;
}

if (isset($_POST['palabras']) && is_array($_POST['palabras'])) {
    $palabrasOrdenadas = ordenarPalabras($_POST['palabras']);
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
    <title>Palabras Ordenadas</title>
    <link rel="stylesheet" href="stylesp4.css"/>
</head>
<body>
    <h2>Palabras Ordenadas</h2>
    <div class="lista-palabras">
        <ol>
            <?php foreach ($palabrasOrdenadas as $palabra) { echo "<li>$palabra</li>"; } ?>
        </ol>
    </div>
    <br><br>
    <a href="index.html"><button>Volver</button></a>
</body>
</html>