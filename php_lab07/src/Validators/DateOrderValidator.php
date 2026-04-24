<?php

namespace User\PhpLab07\Validators;

use User\PhpLab07\Contracts\ValidatorInterface;

/**
 * Validator to check that one date is later than another.
 */
class DateOrderValidator implements ValidatorInterface
{
    private string $startField;
    private string $endField;
    private string $message;

    /**
     * @param string $startField Name of the start date field
     * @param string $endField Name of the end date field
     * @param string $message Error message to return
     */
    public function __construct(string $startField, string $endField, string $message)
    {
        $this->startField = $startField;
        $this->endField = $endField;
        $this->message = $message;
    }

    /**
     * Validates that the end date is later than the start date.
     * @param array $data Form data
     * @return string|null Error message or null if valid
     */
    public function validate(array $data): ?string
    {
        $start = trim($data[$this->startField] ?? '');
        $end = trim($data[$this->endField] ?? '');

        if ($start === '' || $end === '') {
            return null;
        }

        if (!strtotime($start) || !strtotime($end)) {
            return null;
        }

        if (strtotime($end) <= strtotime($start)) {
            return $this->message;
        }

        return null;
    }
}