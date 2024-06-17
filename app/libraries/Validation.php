<?php
class Validation {
    private $errors = [];

    public function validateRequired($field, $value, $message) {
        if (empty($value)) {
            $this->errors[$field] = $message;
        }
    }

    public function validateUsername($field, $value, $message) {
        if (!preg_match('/^[a-zA-Z0-9]{4,16}$/', $value)) {
            $this->errors[$field] = $message;
        }
    }

    public function validateEmail($field, $value, $message) {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field] = $message;
        }
    }

    public function validatePassword($field, $value, $message) {
        if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/', $value)) {
            $this->errors[$field] = $message;
        }
    }

    public function validateMatch($field, $value, $fieldToMatch, $valueToMatch, $message) {
        if ($value !== $valueToMatch) {
            $this->errors[$field] = $message;
        }
    }

    public function hasErrors() {
        return !empty($this->errors);
    }

    public function getErrors() {
        return $this->errors;
    }
}
?>
