<?php
if (isset($_GET['b']) && isset($_GET['h'])) {
    $b = floatval($_GET['b']);
    $h = floatval($_GET['h']);
    $area = ($b * $h) / 2;
    echo "<h2>Resultado</h2>";
    echo "El área del triángulo con base $b y altura $h es: <strong>$area</strong>";
} else {
    echo "Por favor, ingrese valores válidos.";
}
?>
