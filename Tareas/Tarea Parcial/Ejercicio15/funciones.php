<?php
class Funciones
{
    public function fibonacci($n)
    {
        $fibonacci = array(0, 1);
        for ($i = 2; $i <= $n; $i++) {
            $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
        }
        return $fibonacci;
    }

    public function suma($fibonacci){
        $suma = 0;
        foreach ($fibonacci as $numero) {
            $suma += $numero;
        }
        return $suma;
    }
}
?>