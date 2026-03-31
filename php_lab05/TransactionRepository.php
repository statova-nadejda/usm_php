<?php
declare(strict_types=1);

namespace php_lab05;

class TransactionRepository implements TransactionStorageInterface
{
    private array $transactions = [];

    public function getTransactions(): array
    {
        return $this->transactions;
    }

    public function addTransaction(Transaction $transaction): void
    {
        $this->transactions[] = $transaction;
    }

    public function removeTransactionById(int $id): void
    {
        foreach ($this->transactions as $index => $transaction) {
            if ($transaction->getId() == $id) {
                unset($this->transactions[$index]);
                return;
            }
        }
    }

    public function findById(int $id): ?Transaction
    {
        return array_find($this->transactions, fn($transaction) => $transaction->getId() === $id);
    }
}