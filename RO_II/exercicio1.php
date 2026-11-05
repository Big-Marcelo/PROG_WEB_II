<?php

$nome = "João";

$nota1 = 8.0;
$nota2 = 7.0;
$nota3 = 7.0;

function calcularMedia(float $nota1, float $nota2, float $nota3): float {
    return ($nota1 + $nota2 + $nota3) / 3;
}

$media = calcularMedia($nota1, $nota2, $nota3);

if ($media >= 7) {
    $situacao = "Aprovado";
} elseif ($media >= 5) {
    $situacao = "Exame";
} else {
    $situacao = "Reprovado";
}

echo "Aluno: $nome\n";
echo "Média: " . number_format($media, 1, '.', '') . "\n";
echo "Situação: $situacao\n";