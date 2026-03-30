<?php
declare(strict_types=1);

namespace php_lab05;

class Transaction
{
    private int $id;
    private DateTime $date;
    private float $amount;
    private string $description;
    private string $merchant;

    public function getId()
    {
        return $this->id;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getMerchant()
    {
        return $this->merchant;
    }

    public function __construct(int $id, DateTime $date, float $amount, string $description, string $merchant)
    {
        $this->id = $id;
        $this->date = $date;
        $this->amount = $amount;
        $this->description = $description;
        $this->merchant = $merchant;
    }

    public function getDaysSinceTransaction() : int
    {
        $currentDate = new DateTime();

        $difference = $currentDate->diff($this->date);

        return $difference->days;
    }
}