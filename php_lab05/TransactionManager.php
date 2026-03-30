<?php

namespace php_lab05;

class TransactionManager
{
    public function __construct(private readonly TransactionRepository $repository)
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

        $startDate = new DateTime($startDate);
        $endDate = new DateTime($endDate);

        return array_reduce($transactions, function($totalAmount, $transaction) use ($startDate, $endDate) {
            if($transaction->getDate() > $startDate && $transaction->getDate() < $endDate)
                return $totalAmount + $transaction->getAmount();
        });
    }

    public function countTransactionsByMerchant(string $merchant): int
    {
        $transactions = $this->repository->getAllTransactions();

        return array_reduce($transactions, function($transactionsByMerchant, $transaction) use ($merchant){
            if($transaction->getMerchant() === $merchant)
                return $transactionsByMerchant++;
        }, 0);
    }

    public function sortTransactionsByDate(): array
    {
        $transactions = $this->repository->getAllTransactions();

        return usort($transactions, function($firstTransaction, $secondTransaction) {
            if($firstTransaction->getDate() < $secondTransaction->getDate()) return -1;
            if($firstTransaction->getDate() === $secondTransaction->getDate()) return 0;
            if($firstTransaction->getDate() > $secondTransaction->getDate()) return 1;
        });
    }

    public function sortTransactionsByAmountDesc(): array
    {
        $transactions = $this->repository->getAllTransactions();

        return usort($transactions, function($firstTransaction, $secondTransaction) {
            if($firstTransaction->getAmount() < $secondTransaction->getAmount()) return 1;
            if($firstTransaction->getAmount() === $secondTransaction->getAmount()) return 0;
            if($firstTransaction->getAmount() > $secondTransaction->getAmount()) return -1;
        });
    }

}