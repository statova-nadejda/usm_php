<?php
declare(strict_types=1);

namespace php_lab05;
use DateTime;
use DateMalformedStringException;

class TransactionManager
{
    /**
     * Constructor for the TransactionManager class.
     *
     * @param TransactionStorageInterface $repository Repository for storing transactions.
     */
    public function __construct(private readonly TransactionStorageInterface $repository)
    {
    }

    /**
     * Calculates the total amount of all transactions.
     *
     * @return float The total amount of all transactions.
     */
    public function calculateTotalAmount(): float
    {
        $transactions = $this->repository->getTransactions();

        return array_reduce($transactions, function ($sum, $transaction) {
            return $sum + $transaction->getAmount();
        }, 0.0);
    }

    /**
     * Calculates the total amount of transactions within a specified date range.
     *
     * @param string $startDate Start date of the range in 'YYYY-MM-DD' format.
     * @param string $endDate End date of the range in 'YYYY-MM-DD' format.
     * @return float The total amount of transactions in the date range.
     */
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

    /**
     * Counts the number of transactions for a specified merchant.
     *
     * @param string $merchant The name of the merchant.
     * @return int The number of transactions for the given merchant.
     */
    public function countTransactionsByMerchant(string $merchant): int
    {
        $transactions = $this->repository->getTransactions();

        return array_reduce($transactions, function($transactionsByMerchant, $transaction) use ($merchant){
            return ($transaction->getMerchant() === $merchant)
                ? ++$transactionsByMerchant
                : $transactionsByMerchant;
        }, 0);
    }

    /**
     * Sorts transactions by date in ascending order.
     *
     * @return array The sorted array of transactions.
     */
    public function sortTransactionsByDate(): array
    {
        $transactions = $this->repository->getTransactions();

        usort($transactions, function($firstTransaction, $secondTransaction) {
            return ($firstTransaction->getDate() <=> $secondTransaction->getDate());
        });

        return $transactions;
    }

    /**
     * Sorts transactions by amount in descending order.
     *
     * @return array The sorted array of transactions.
     */
    public function sortTransactionsByAmountDesc(): array
    {
        $transactions = $this->repository->getTransactions();

        usort($transactions, function($firstTransaction, $secondTransaction) {
            return ($secondTransaction->getAmount() <=> $firstTransaction->getAmount());
        });

        return $transactions;
    }

}