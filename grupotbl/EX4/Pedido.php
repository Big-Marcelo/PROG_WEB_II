//Controlar cliente + itens e calcular o total

<?php

class Pedido
{
    private Cliente $cliente;
    private array $itens = [];

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function adicionarProduto(Produto $produto, int $quantidade): void
    {
        $item = new ItemPedido($produto, $quantidade);

        $this->itens[] = $item;
    }

    public function calcularTotal(): float
    {
        $total = 0;

        foreach ($this->itens as $item) {
            $total += $item->calcularSubtotal();
        }

        return $total;
    }

    public function getCliente(): Cliente
    {
        return $this->cliente;
    }

    public function getItens(): array
    {
        return $this->itens;
    }
}
