<?php

namespace php_lab06;

/**
 * Validator for checking if a transport value is allowed.
 */
class TransportValidator implements ValidatorInterface
{
    private string $field;
    private array $allowed;
    private string $message;

    /**
     * @param string $field Name of the field
     * @param array $allowed Allowed values
     * @param string $message Error message to return
     */
    public function __construct(string $field, array $allowed, string $message)
    {
        $this->field = $field;
        $this->allowed = $allowed;
        $this->message = $message;
    }

    /**
     * Validates that the value is in the list of allowed values.
     * @param array $data Form data
     * @return string|null Error message or null if valid
     */
    public function validate(array $data): ?string
    {
        $value = trim($data[$this->field] ?? '');

        if ($value === '') {
            return null;
        }

        if (!in_array($value, $this->allowed, true)) {
            return $this->message;
        }

        return null;
    }
}