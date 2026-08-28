<?php

class Produto
{
    public function __construct(
        private string $nome,
        private float $preco
    ) {}

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }
}

class ItemCarrinho
{
    public function __construct(
        private Produto $produto,
        private int $quantidade
    ) {}

    public function getProduto(): Produto
    {
        return $this->produto;
    }

    public function getQuantidade(): int
    {
        return $this->quantidade;
    }

    public function calcularSubtotal(): float
    {
        return $this->produto->getPreco() * $this->quantidade;
    }
}

class Carrinho
{
    /** @var ItemCarrinho[] */
    private array $itens = [];

    public function adicionarProduto(Produto $produto, int $quantidade): void
    {
        if ($quantidade <= 0) {
            return; // quantidade inválida é rejeitada
        }

        $this->itens[] = new ItemCarrinho($produto, $quantidade);
    }

    public function calcularValorTotal(): float
    {
        $total = 0.0;

        foreach ($this->itens as $item) {
            $total += $item->calcularSubtotal();
        }

        return $total;
    }

    public function calcularQuantidadeTotal(): int
    {
        $quantidade = 0;

        foreach ($this->itens as $item) {
            $quantidade += $item->getQuantidade();
        }

        return $quantidade;
    }

    public function limpar(): void
    {
        $this->itens = [];
    }
}

$teclado = new Produto("Teclado", 120.00);
$mouse   = new Produto("Mouse", 80.00);
$monitor = new Produto("Monitor", 900.00);

$carrinho = new Carrinho();

$carrinho->adicionarProduto($teclado, 2);
$carrinho->adicionarProduto($mouse, 1);
$carrinho->adicionarProduto($monitor, 1);

echo "Valor total: " . $carrinho->calcularValorTotal() . PHP_EOL;  
echo "Quantidade total de itens: " . $carrinho->calcularQuantidadeTotal() . PHP_EOL;

$carrinho->limpar();

echo "Após limpar, quantidade total: " . $carrinho->calcularQuantidadeTotal() . PHP_EOL;