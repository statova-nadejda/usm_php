<?php

namespace User\PhpLab07\Validators;

/**
 * Trip form validator. Validates all form fields using a set of validators.
 */
class TripFormValidator
{
    private array $data;
    private array $errors = [];
    private array $validators = [];

    /**
     *
     * @param array $rawData Form data
     */
    public function __construct(array $rawData)
    {
        $this->data = [
            'title' => trim($rawData['title'] ?? ''),
            'destination' => trim($rawData['destination'] ?? ''),
            'startDate' => trim($rawData['startDate'] ?? ''),
            'endDate' => trim($rawData['endDate'] ?? ''),
            'description' => trim($rawData['description'] ?? ''),
            'budget' => trim($rawData['budget'] ?? ''),
            'transport' => trim($rawData['transport'] ?? ''),
        ];

        $this->validators = [
            'title' => [
                new RequiredValidator('title', 'Title is required'),
                new LengthValidator('title', 2, 50, 'Title must be from 2 to 50 characters'),
            ],
            'destination' => [
                new RequiredValidator('destination', 'Destination is required'),
                new LengthValidator('destination', 2, 50, 'Destination must be from 2 to 50 characters'),
            ],
            'startDate' => [
                new RequiredValidator('startDate', 'Start Date is required'),
                new DateValidator('startDate', 'Invalid start date'),
            ],
            'endDate' => [
                new RequiredValidator('endDate', 'End Date is required'),
                new DateValidator('endDate', 'Invalid end date'),
                new DateOrderValidator('startDate', 'endDate', 'End Date must be later than Start Date'),
            ],
            'budget' => [
                new RequiredValidator('budget', 'Budget is required'),
                new NumericValidator('budget', 'Budget must be a number'),
            ],
            'transport' => [
                new RequiredValidator('transport', 'Transport Type is required'),
                new TransportValidator('transport', ['Car', 'Plane', 'Train', 'Bus'], 'Invalid transport type'),
            ],
        ];
    }

    /**
     * Validates all form fields and collects errors.
     * @return bool true if no errors, otherwise false
     */
    public function validate(): bool
    {
        $this->errors = [];

        foreach ($this->validators as $field => $validators) {
            foreach ($validators as $validator) {
                $error = $validator->validate($this->data);

                if ($error !== null) {
                    $this->errors[$field] = $error;
                    break;
                }
            }
        }

        return empty($this->errors);
    }

    /**
     * Returns an array of validation errors.
     * @return array Array of errors
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * Returns sanitized form data.
     * @return array Array of data
     */
    public function getData(): array
    {
        return $this->data;
    }
}