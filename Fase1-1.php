<?php

//  calcular coeficiente binomial C(n, k)
function coefBinomial($n, $k) {
    if ($k == 0 || $k == $n) {
        return 1;
    } else {
        return coefBinomial($n - 1, $k - 1) + coefBinomial($n - 1, $k);
    }
}

//  desarrollo del binomio (a + b)^n
function binomio($n) {
    $resultado = "(a + b)^$n = ";

    for ($k = 0; $k <= $n; $k++) {
        $coef = coefBinomial($n, $k);
        $expA = $n - $k;
        $expB = $k;

        // Construcción del término
        $termino = "";

        if ($coef != 1) {
            $termino .= $coef;
        }

        if ($expA > 0) {
            $termino .= "a";
            if ($expA > 1) {
                $termino .= "^$expA";
            }
        }

        if ($expB > 0) {
            $termino .= "b";
            if ($expB > 1) {
                $termino .= "^$expB";
            }
        }

        $resultado .= $termino;

        if ($k != $n) {
            $resultado .= " + ";
        }
    }

    return $resultado;
}

// Solicitar valor de la potencia
$n = (int) readline("Ingrese la potencia a la que desea elevar el binomio: ");
echo binomio($n) . PHP_EOL;
?>
