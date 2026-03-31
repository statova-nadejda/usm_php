<?php
declare(strict_types=1);

namespace php_lab05;

interface TransactionStorageInterface
{
    function addTransaction(Transaction $transaction): void;

    function removeTransactionById(int $id): void;

    function getTransactions(): array;

    function findById(int $id): ?Transaction;
}