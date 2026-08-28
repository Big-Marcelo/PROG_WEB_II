//Relacionar produto + quantidade e calcular o subtotal

<?php

class ItemPedido
{
    private Produto $produto;
    private int $quantidade;

    public function __construct(Produto $produto, int $quantidade)
    {
        $this->produto = $produto;
        $this->quantidade = $quantidade;
    }

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
