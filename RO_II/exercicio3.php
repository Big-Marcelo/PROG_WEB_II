<?php

function calcularTotal(float $preco, int $quantidade): float {
    return $preco * $quantidade;
}

$preco1 = 100;
$quantidade1 = 2;

$total1 = calcularTotal($preco1, $quantidade1);

$preco2 = 50;
$quantidade2 = 4;

$total2 = calcularTotal($preco2, $quantidade2);

$total = $total1 + $total2;

echo $total;