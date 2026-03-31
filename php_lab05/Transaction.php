<?php
declare(strict_types=1);

namespace php_lab05;
use DateTime;

class Transaction
{
    private int $id;
    private DateTime $date;
    private float $amount;
    private string $description;
    private string $merchant;

    /**
     * Returns the transaction ID.
     *
     * @return int The transaction ID.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the transaction date.
     *
     * @return DateTime The transaction date.
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Returns the transaction amount.
     *
     * @return float The transaction amount.
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Returns the transaction description.
     *
     * @return string The transaction description.
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Returns the merchant name.
     *
     * @return string The merchant name.
     */
    public function getMerchant()
    {
        return $this->merchant;
    }

    /**
     * Constructor for the Transaction class.
     *
     * @param int $id The transaction ID.
     * @param DateTime $date The transaction date.
     * @param float $amount The transaction amount.
     * @param string $description The transaction description.
     * @param string $merchant The merchant name.
     */
    public function __construct(int $id, DateTime $date, float $amount, string $description, string $merchant)
    {
        $this->id = $id;
        $this->date = $date;
        $this->amount = $amount;
        $this->description = $description;
        $this->merchant = $merchant;
    }

    /**
     * Calculates the number of days since the transaction date to the current date.
     *
     * @return int The number of days since the transaction.
     */
    public function getDaysSinceTransaction() : int
    {
        $currentDate = new DateTime();

        $difference = $currentDate->diff($this->date);

        return $difference->days;
    }
}