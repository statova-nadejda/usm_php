<?php
declare(strict_types=1);

namespace php_lab05;
use DateTime;
use DateMalformedStringException;

class TransactionManager
{
    public function __construct(private readonly TransactionStorageInterface $repository)
    {
    }

    public function calculateTotalAmount(): float
    {
        $transactions = $this->repository->getTransactions();

        return array_reduce($transactions, function ($sum, $transaction) {
            return $sum + $transaction->getAmount();
        }, 0.0);
    }

    public function calculateTotalAmountByDateRange(string $startDate, string $endDate): float
    {
        $transactions = $this->repository->getTransactions();

        try {
            $startDate = new DateTime($startDate);
            $endDate = new DateTime($endDate);
        } catch (DateMalformedStringException $e) {
            echo "Error: ", $e->getMessage();
        }

        return array_reduce($transactions, function($totalAmount, $transaction) use ($startDate, $endDate) {
            return ($transaction->getDate() >= $startDate && $transaction->getDate() <= $endDate)
                ? $totalAmount + $transaction->getAmount()
                : $totalAmount;
        }, 0.0);
    }

    public function countTransactionsByMerchant(string $merchant): int
    {
        $transactions = $this->repository->getTransactions();

        return array_reduce($transactions, function($transactionsByMerchant, $transaction) use ($merchant){
            return ($transaction->getMerchant() === $merchant)
                ? ++$transactionsByMerchant
                : $transactionsByMerchant;
        }, 0);
    }

    public function sortTransactionsByDate(): array
    {
        $transactions = $this->repository->getTransactions();

        usort($transactions, function($firstTransaction, $secondTransaction) {
            return ($firstTransaction->getDate() <=> $secondTransaction->getDate());
        });

        return $transactions;
    }

    public function sortTransactionsByAmountDesc(): array
    {
        $transactions = $this->repository->getTransactions();

        usort($transactions, function($firstTransaction, $secondTransaction) {
            return ($secondTransaction->getAmount() <=> $firstTransaction->getAmount());
        });

        return $transactions;
    }

}