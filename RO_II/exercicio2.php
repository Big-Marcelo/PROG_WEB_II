<?php

$produtos = [
    [
        "nome" => "Teclado",
        "preco" => 120.00,
        "estoque" => 15
    ],
    [
        "nome" => "Mouse",
        "preco" => 80.00,
        "estoque" => 0
    ],
    [
        "nome" => "Monitor",
        "preco" => 900.00,
        "estoque" => 5
    ],
    [
        "nome" => "Headset",
        "preco" => 150.00,
        "estoque" => 8
    ],
    [
        "nome" => "Webcam",
        "preco" => 200.00,
        "estoque" => 3
    ]
];

function calcularValorEstoque(float $preco, int $quantidade): float {
    return $preco * $quantidade;
}

$totalEstoque = 0;

foreach ($produtos as $produto) {

    if ($produto["estoque"] > 0) {

        $valorEstoque = calcularValorEstoque(
            $produto["preco"],
            $produto["estoque"]
        );

        echo "Produto: " . $produto["nome"] . PHP_EOL;
        echo "Preço: R$ " . number_format($produto["preco"], 2, ',', '.') . PHP_EOL;
        echo "Estoque: " . $produto["estoque"] . PHP_EOL;
        echo "Valor em estoque: R$ " . number_format($valorEstoque, 2, ',', '.') . PHP_EOL;

        echo "--------------------------" . PHP_EOL;

        $totalEstoque += $valorEstoque;
    }
}

echo "Valor total do estoque: R$ " .
    number_format($totalEstoque, 2, ',', '.') . PHP_EOL;