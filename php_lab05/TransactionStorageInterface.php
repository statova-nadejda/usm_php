<?php
declare(strict_types=1);

namespace php_lab05;

interface TransactionStorageInterface
{
    /**
     * Adds a new transaction to the storage.
     *
     * @param Transaction $transaction The transaction object to add.
     * @return void
     */
    function addTransaction(Transaction $transaction): void;

    /**
     * Removes a transaction by its ID.
     *
     * @param int $id The ID of the transaction to remove.
     * @return void
     */
    function removeTransactionById(int $id): void;

    /**
     * Returns all transactions from the storage.
     *
     * @return array Array of all transactions.
     */
    function getTransactions(): array;

    /**
     * Finds a transaction by its ID.
     *
     * @param int $id The ID of the transaction.
     * @return Transaction|null The found transaction or null if not found.
     */
    function findById(int $id): ?Transaction;
}