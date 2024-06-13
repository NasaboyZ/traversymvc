<?php
class Validation {
    private $errors = [];

    // Validate required fields
    public function validateRequired($field, $value, $message) {
        if (empty($value)) {
            $this->errors[$field] = $message;
        }
    }

    // Validate email format
    public function validateEmail($field, $value, $message) {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field] = $message;
        }
    }

    // Validate string length
    public function validateLength($field, $value, $min, $max, $message) {
        if (strlen($value) < $min || strlen($value) > $max) {
            $this->errors[$field] = $message;
        }
    }

    // Validate that two fields match
    public function validateMatch($field1, $value1, $field2, $value2, $message) {
        if ($value1 !== $value2) {
            $this->errors[$field1] = $message;
        }
    }

    // Validate username
    public function validateUsername($field, $value, $message) {
        if (!preg_match("/^[a-zA-Z0-9]{4,16}$/", $value)) {
            $this->errors[$field] = $message;
        }
    }

    // Validate password
    public function validatePassword($field, $value, $message) {
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[^\s]{8,}$/", $value)) {
            $this->errors[$field] = $message;
        }
    }

    // Validate radio input
    public function validateRadio($field, $value, $options, $message) {
        if (empty($value) || !in_array($value, $options)) {
            $this->errors[$field] = $message;
        }
    }

    // Get errors
    public function getErrors() {
        return $this->errors;
    }

    // Check if there are any errors
    public function hasErrors() {
        return !empty($this->errors);
    }
}
?>
