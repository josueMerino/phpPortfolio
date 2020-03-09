<?php
echo '<hr/>';
echo 'Ejercicio 1';
echo '<hr/>';
$arreglo = [
    'keyStr' => 'lado',
    0 => 'ledo',

    'keyStr2' => 'lido',
    1 => 'lodo',
    2 => 'ludo'
];

$recorr = [
    $arreglo['keyStr'],
    $arreglo[0],
    $arreglo['keyStr2'],
    $arreglo[1],
    $arreglo[2]
];

foreach ($recorr as $valor) {
    # code...
    echo $valor.' ';
}
echo '<br/>decirlo al revés lo dudo<br/>';
for ($i=(count($recorr) - 1); $i >= 0  ; $i--) { 
    # code...
    echo $recorr[$i].' ';
}
echo '<br/>¡Qué trabajo me ha costado!<br/><br/>';

echo '<hr/>';
echo 'Ejercicio 2';
echo '<hr/>';

$paisCiudad =
[
    'México' =>
    [
        'CDMX', 'Guadalajara', 'Tijuana'
    ],

    'España' =>
    [
        'Galicia', 'Madrid', 'Toledo'
    ],

    'El Salvador' =>
    [
        'San Salvador', 'La Libertad', 'Sonsonate'
    ],

    'Colombia' =>
    [
        'Bogotá', 'Medellín', 'Santa Marta'
    ],

    'Nicaragua' =>
    [
        'Managua', 'Chinandega', 'León'
    ]

];

foreach ($paisCiudad as $pais => $ciudades) {
    # code...
    echo ("$pais: <br/>");
    foreach ($ciudades as $ciudad) {
        # code...
        echo ($ciudad.', ');
    }
    echo '<br/>';
    echo '<br/>';

}

echo '<hr/>';
echo 'Ejercicio 3';
echo '<hr/>';

$valores = [23, 54, 32, 67, 34, 78, 98, 56, 21, 34, 57, 92, 12, 5, 61];
sort($valores);
echo "Estos son los 3 números mayores: ";
for ($i=12; $i < 15 ; $i++) { 
    # code...
    echo "<br/>$valores[$i]<br/>";
}
echo "<br/>Estos son los 3 números menores del array: ";
for ($i=0; $i < 3 ; $i++) { 
    # code...
    echo "<br/>$valores[$i]<br/>";
}

/*for($i=0;$i<count($valores);$i++)//uso un for para leer desde la primera posicion hasta la ultima
	{
		for($j=$i+1;$j<count($valores);$j++){//un segundo for para leer desde la siguiente posicion
			if($valores[$i]<$valores[$j]){//si el primer valor es menor al siguiente
				$temporal=$valores[$j];//guardo temporalmente el valor de la posicion siguiente
				$valores[$j]=$valores[$i];//asigno el valor de la siguiente posicion con el valor de la primera posicion
				$valores[$i]=$temporal;//y a la primera posicion uso el valor temporal que cree, para guardar el valor de la siguiente posicion
                echo $j.' ';
            }//notese que cambiamos el valor de las posiciones en las iteraciones
		}
	}

echo "<br>";
echo "Array ordenado de forma descendente sin funciones nativas de php: ".implode(", ",$valores);
echo "<br><br>Los 3 numeros de mayor valor: $valores[0],$valores[1],$valores[2]<br>";
echo "<br>Los 3 numeros de menor valor: $valores[12],$valores[13],$valores[14]<br>"; */




?>