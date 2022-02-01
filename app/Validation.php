<?php

namespace App;

class Validation
{
    private array $errors = [];

    public function __construct(private array $data)
    {}

    public function validate(array $rules): void
    {
        foreach ($rules as $validationKey => $validationRules) {
            foreach ($validationRules as $validationRule) {
                $error = $this->$validationRule($validationKey);
                if ($error) {
                    $this->errors[$validationKey] = $error;
                    break;
                }
            }
        }

        $this->checkAgainstErrors();
    }

    private function required(string $validationKey)
    {
        if (!array_key_exists($validationKey, $this->data)) {
            return 'Le champ ' . $validationKey . ' doit être rempli.';
        }
    }

    private function numeric(string $validationKey)
    {
        if (!is_numeric($this->data[$validationKey]) || $this->data[$validationKey] < 0) {
            return 'La valeur ' . $validationKey . ' doit être un nombre valide.';
        }
    }

    private function checkAgainstErrors(): void
    {
        if (!empty($this->errors)) {
            $_SESSION['errors'] = $this->errors;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
}