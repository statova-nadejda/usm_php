<?php
declare(strict_types=1);

namespace php_lab05;

class TransactionRepository implements TransactionStorageInterface
{
    private array $transactions = [];

    /**
     * Returns all transactions.
     *
     * @return array Array of all transactions.
     */
    public function getTransactions(): array
    {
        return $this->transactions;
    }

    /**
     * Adds a new transaction to the repository.
     *
     * @param Transaction $transaction The transaction object to add.
     * @return void
     */
    public function addTransaction(Transaction $transaction): void
    {
        $this->transactions[] = $transaction;
    }

    /**
     * Removes a transaction by its ID.
     *
     * @param int $id The ID of the transaction to remove.
     * @return void
     */
    public function removeTransactionById(int $id): void
    {
        foreach ($this->transactions as $index => $transaction) {
            if ($transaction->getId() == $id) {
                unset($this->transactions[$index]);
                return;
            }
        }
    }

    /**
     * Finds a transaction by its ID.
     *
     * @param int $id The ID of the transaction.
     * @return Transaction|null The found transaction or null if not found.
     */
    public function findById(int $id): ?Transaction
    {
        return array_find($this->transactions, fn($transaction) => $transaction->getId() === $id);
    }
}