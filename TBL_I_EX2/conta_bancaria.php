<?php

class ContaBancaria
{
    private float $saldo;

    public function __construct(float $saldoInicial = 0.0)
    {
        if ($saldoInicial < 0) {
            throw new InvalidArgumentException("O saldo inicial não pode ser negativo.");
        }

        $this->saldo = $saldoInicial;
    }

    public function depositar(float $valor): void
    {
        if ($valor <= 0) {
            return;
        }

        $this->saldo += $valor;
    }

    public function sacar(float $valor): bool
    {
        if ($valor <= 0) {
            return false; 
        }

        if ($valor > $this->saldo) {
            return false; 
        }

        $this->saldo -= $valor;
        return true;
    }

    public function getSaldo(): float
    {
        return $this->saldo;
    }
}

$contaA = new ContaBancaria(500.00);
$contaB = new ContaBancaria(100.00);

$contaA->depositar(200.00);
$contaA->sacar(150.00);

$contaB->depositar(50.00);
$sucesso = $contaB->sacar(1000.00);

echo "Saldo da Conta A: " . $contaA->getSaldo() . PHP_EOL; 
echo "Saldo da Conta B: " . $contaB->getSaldo() . PHP_EOL; 
echo "Saque inválido na Conta B foi bem-sucedido? " . ($sucesso ? "Sim" : "Não") . PHP_EOL; 