<?php

namespace User\PhpLab07\Contracts;

/**
 * Interface for form validators.
 */
interface ValidatorInterface
{
    /**
     * Validates form data.
     * @param array $data Form data
     * @return string|null Error message or null if valid
     */
    public function validate(array $data): ?string;
}