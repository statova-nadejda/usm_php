<?php

namespace User\PhpLab07\Validators;

use User\PhpLab07\Contracts\ValidatorInterface;

/**
 * Validator for checking if a value is a valid date.
 */
class DateValidator implements ValidatorInterface
{
    private string $field;
    private string $message;

    /**
     * @param string $field Name of the date field
     * @param string $message Error message to return
     */
    public function __construct(string $field, string $message)
    {
        $this->field = $field;
        $this->message = $message;
    }

    /**
     * Validates that the value is a valid date.
     * @param array $data Form data
     * @return string|null Error message or null if valid
     */
    public function validate(array $data): ?string
    {
        $value = trim($data[$this->field] ?? '');

        if ($value === '') {
            return null;
        }

        if (!strtotime($value)) {
            return $this->message;
        }

        return null;
    }
}