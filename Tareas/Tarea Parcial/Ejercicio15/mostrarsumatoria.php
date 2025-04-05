<?php
include("funciones.php");
$n=$_GET['numero'];
$funciones = new Funciones();
$fibonacci = $funciones->fibonacci($n);
$suma = $funciones->suma($fibonacci);
echo "<h2>La suma de la secuencia Fibonacci de $n es: $suma</h2>";
?>