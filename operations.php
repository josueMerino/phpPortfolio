<?php
echo 'Ejercicio 1';
echo '<hr/>';

$a = 32 + 3;

$b = 3*(2+3);

echo 'El resultado de la operación "32 + 3" = '.$a;
echo '<br/>';
echo 'El resultado de la operación "3(2+3)" = '.$b;

echo '<hr/>';
echo 'Ejercicio 2';
echo '<hr/>';

$valor = 4;

if (($valor > 5) && ($valor < 10) ) {
    # code...
    echo 'El valor es mayor que 5 pero menor que 10';
}
else
{
    echo 'xd';
}

echo '<br/>';

$valor = 15;
if (($valor >= 0) && ($valor <= 20)) {
    # code...
    echo 'El valor es mayor o igual a 0 pero menor o igual a 20';
}
else
{
    echo 'xd';
}

echo '<br/>';

$valor = "10";

if ($valor === "10") {
    # code...
    echo 'El valor es "10"';
}
elseif ($valor === 10) {
    # code...
    echo 'El valor es 10';
}
else {
    echo 'xd';
}

echo '<br/>';

$valor = 11;

// Primera solución
if (($valor > 0) && ($valor < 5)) {
    # code...
    echo 'El valor es mayor que 0 y menor que 5';
}
elseif(($valor > 10) && ($valor < 15)) {
    # code...
    echo 'El valor es mayor que 10 y menor que 15';
}

// Segunda solución
/*if ((($valor > 0) && ($valor < 5)) || (($valor > 10) && ($valor < 15))) {
    # code...
    
}*/

?>