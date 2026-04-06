<?php

namespace php_lab06;

/**
 * Validator for checking if a value is numeric.
 */
class NumericValidator implements ValidatorInterface
{
    private string $field;
    private string $message;

    /**
     * @param string $field Name of the field
     * @param string $message Error message to return
     */
    public function __construct(string $field, string $message)
    {
        $this->field = $field;
        $this->message = $message;
    }

    /**
     * Validates that the value is numeric.
     * @param array $data Form data
     * @return string|null Error message or null if valid
     */
    public function validate(array $data): ?string
    {
        $value = trim($data[$this->field] ?? '');

        if ($value === '') {
            return null;
        }

        if (!is_numeric($value)) {
            return $this->message;
        }

        return null;
    }
}