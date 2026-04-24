<?php

namespace User\PhpLab07\Validators;

use User\PhpLab07\Contracts\ValidatorInterface;

/**
 * Validator for checking the length of a string field.
 */
class LengthValidator implements ValidatorInterface
{
    private string $field;
    private int $min;
    private int $max;
    private string $message;

    /**
     * @param string $field Name of the field
     * @param int $min Minimum length
     * @param int $max Maximum length
     * @param string $message Error message to return
     */
    public function __construct(string $field, int $min, int $max, string $message)
    {
        $this->field = $field;
        $this->min = $min;
        $this->max = $max;
        $this->message = $message;
    }

    /**
     * Validates that the string length is within the specified range.
     * @param array $data Form data
     * @return string|null Error message or null if valid
     */
    public function validate(array $data): ?string
    {
        $value = trim($data[$this->field] ?? '');

        if ($value === '') {
            return null;
        }

        $length = strlen($value);

        if ($length < $this->min || $length > $this->max) {
            return $this->message;
        }

        return null;
    }
}