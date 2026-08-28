//Criar os objetos e demonstrar o funcionamento

<?php

require_once 'Cliente.php';
require_once 'Produto.php';
require_once 'ItemPedido.php';
require_once 'Pedido.php';


$cliente = new Cliente(
    "João Silva",
    "joaosliva@email.com"
);


$produto1 = new Produto(
    "Teclado",
    320.00
);

$produto2 = new Produto(
    "Mouse",
    80.00
);

$produto3 = new Produto(
    "Monitor",
    3000.00
);


$pedido = new Pedido($cliente);


$pedido->adicionarProduto($produto1, 2);
$pedido->adicionarProduto($produto2, 1);
$pedido->adicionarProduto($produto3, 2);


echo "PEDIDO" . PHP_EOL;

echo "Cliente: " . $pedido->getCliente()->getNome() . PHP_EOL;

echo "E-mail: " . $pedido->getCliente()->getEmail() . PHP_EOL;

echo PHP_EOL;


foreach ($pedido->getItens() as $item) {

    echo "Produto: " . $item->getProduto()->getNome() . PHP_EOL;

    echo "Quantidade: " . $item->getQuantidade() . PHP_EOL;

    echo "Preço: R$ " . number_format(
        $item->getProduto()->getPreco(),
        2,
        ',',
        '.'
    ) . PHP_EOL;

    echo "Subtotal: R$ " . number_format(
        $item->calcularSubtotal(),
        2,
        ',',
        '.'
    ) . PHP_EOL;

    echo "------------------------" . PHP_EOL;
}


echo "TOTAL: R$ " . number_format(
    $pedido->calcularTotal(),
    2,
    ',',
    '.'
) . PHP_EOL;
