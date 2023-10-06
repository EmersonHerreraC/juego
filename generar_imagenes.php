<?php
$numManzanasIzquierdaVerdes = rand(1, 5);
$numManzanasIzquierdaRojas = rand(1, 5);
$numManzanasDerechaVerdes = rand(1, 5);
$numManzanasDerechaRojas = rand(1, 5);

function generarManzana($color)
{
    $imagen = 'manzana_' . $color . '.png';
    return $imagen;
}

$imagenesIzquierda = [];
$coloresIzquierda = [];

for ($i = 0; $i < $numManzanasIzquierdaVerdes; $i++) {
    $imagen = generarManzana('verde');
    $imagenesIzquierda[] = $imagen;
    $coloresIzquierda[] = 'verde';
}

for ($i = 0; $i < $numManzanasIzquierdaRojas; $i++) {
    $imagen = generarManzana('roja');
    $imagenesIzquierda[] = $imagen;
    $coloresIzquierda[] = 'roja';
}

$imagenesDerecha = [];
$coloresDerecha = [];

for ($i = 0; $i < $numManzanasDerechaVerdes; $i++) {
    $imagen = generarManzana('verde');
    $imagenesDerecha[] = $imagen;
    $coloresDerecha[] = 'verde';
}

for ($i = 0; $i < $numManzanasDerechaRojas; $i++) {
    $imagen = generarManzana('roja');
    $imagenesDerecha[] = $imagen;
    $coloresDerecha[] = 'roja';
}

$colorSuma = $coloresIzquierda[array_rand($coloresIzquierda)];

$response = [
    'imagenesIzquierda' => $imagenesIzquierda,
    'imagenesDerecha' => $imagenesDerecha,
    'coloresIzquierda' => $coloresIzquierda,
    'coloresDerecha' => $coloresDerecha,
    'colorSuma' => $colorSuma,
];

header('Content-Type: application/json');
echo json_encode($response);
?>

