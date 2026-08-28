<?php

declare(strict_types=1);


class Produto
{
    private string $nome;
    private float $preco;
    private int $estoque;

    public function __construct(string $nome, float $preco, int $estoque)
    {
        if (trim($nome) === '') {
            throw new InvalidArgumentException('O nome do produto não pode ser vazio.');
        }

        if ($preco < 0) {
            throw new InvalidArgumentException('O preço não pode ser negativo.');
        }

        if ($estoque < 0) {
            throw new InvalidArgumentException('O estoque inicial não pode ser negativo.');
        }

        $this->nome = $nome;
        $this->preco = $preco;
        $this->estoque = $estoque;
    }

    public function aplicarDesconto(float $percentual): void
    {
        if ($percentual < 0 || $percentual > 100) {
            echo "Desconto inválido: {$percentual}% (deve estar entre 0 e 100).\n";
            return;
        }

        $novoPreco = $this->preco - ($this->preco * ($percentual / 100));

        if ($novoPreco < 0) {
            echo "Desconto de {$percentual}% deixaria o preço negativo. Operação cancelada.\n";
            return;
        }

        $this->preco = $novoPreco;
        echo "Desconto de {$percentual}% aplicado. Novo preço de {$this->nome}: R$ " .
            number_format($this->preco, 2, ',', '.') . "\n";
    }

    public function reporEstoque(int $quantidade): void
    {
        if ($quantidade <= 0) {
            echo "Quantidade inválida para reposição: {$quantidade}.\n";
            return;
        }

        $this->estoque += $quantidade;
        echo "Estoque de {$this->nome} reposto em {$quantidade} unidade(s). Estoque atual: {$this->estoque}.\n";
    }

    public function vender(int $quantidade): bool
    {
        if ($quantidade <= 0) {
            echo "Quantidade inválida para venda: {$quantidade}.\n";
            return false;
        }

        if ($quantidade > $this->estoque) {
            echo "Venda não realizada: estoque insuficiente de {$this->nome} " .
                "(disponível: {$this->estoque}, solicitado: {$quantidade}).\n";
            return false;
        }

        $this->estoque -= $quantidade;
        echo "Venda de {$quantidade} unidade(s) de {$this->nome} realizada com sucesso. " .
            "Estoque restante: {$this->estoque}.\n";
        return true;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function getEstoque(): int
    {
        return $this->estoque;
    }
}


echo "=== Produto 1: Notebook ===\n";
$notebook = new Produto('Notebook', 3500.00, 10);
echo "Preço inicial: R$ " . number_format($notebook->getPreco(), 2, ',', '.') . "\n";
echo "Estoque inicial: {$notebook->getEstoque()}\n\n";

$notebook->aplicarDesconto(10);         // desconto válido
$notebook->vender(3);                   // venda válida
$notebook->vender(100);                 // venda maior que o estoque -> falha
$notebook->reporEstoque(5);             // repõe estoque
$notebook->vender(0);                   // quantidade inválida -> falha

echo "\n=== Produto 2: Mouse ===\n";
$mouse = new Produto('Mouse', 50.00, 20);
echo "Preço inicial: R$ " . number_format($mouse->getPreco(), 2, ',', '.') . "\n";
echo "Estoque inicial: {$mouse->getEstoque()}\n\n";

$mouse->aplicarDesconto(150);            // desconto inválido (>100%) -> falha
$mouse->aplicarDesconto(50);             // desconto válido
$mouse->vender(15);                      // venda válida
$mouse->reporEstoque(-5);                // reposição inválida -> falha

echo "\n=== Estado final ===\n";
echo "{$notebook->getNome()}: preço R$ " . number_format($notebook->getPreco(), 2, ',', '.') .
    ", estoque {$notebook->getEstoque()}\n";
echo "{$mouse->getNome()}: preço R$ " . number_format($mouse->getPreco(), 2, ',', '.') .
    ", estoque {$mouse->getEstoque()}\n";