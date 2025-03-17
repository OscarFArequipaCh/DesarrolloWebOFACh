<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Área</title>
</head>
<body>
    <h2>Calculadora del Área de un Triángulo</h2>
    <form action="area.php" method="GET">
        <label for="base">Base (b):</label>
        <input type="number" name="b" id="base" required><br><br>

        <label for="altura">Altura (h):</label>
        <input type="number" name="h" id="altura" required><br><br>

        <input type="submit" value="Calcular Área">
    </form>
</body>
</html>
