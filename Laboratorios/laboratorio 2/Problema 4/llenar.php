<?php
if (isset($_GET['cantidad']) && is_numeric($_GET['cantidad'])) {
    $cantidad = (int)$_GET['cantidad'];
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
    <title>Ingresar Palabras</title>
    <link rel="stylesheet" href="stylesp4.css">
</head>
<body>
    <h2>Ingrese las palabras</h2>
    <form action="ordenar.php" method="POST">
        <?php for ($i = 1; $i <= $cantidad; $i++): ?>
            <div>
            <label for="palabra<?php echo $i; ?>">Palabra <?php echo $i; ?>:</label>
            <input type="text" name="palabras[]" required><br>
        </div>
        <?php endfor; ?>
        <button type="submit">Ordenar</button>
    </form>
</body>
</html>