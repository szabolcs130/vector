<?php
require_once __DIR__ . '/../exceptions/ValidationException.php';
class RequestValidator {
    public static function validateRegister($userData) {
        $errors = [];
        $name=trim($userData['name'] ?? '');
        $email=$userData['email'] ?? '';
        $length=mb_strlen($name, 'UTF-8');
        if (empty($name)) {
            $errors[] = "Name is required!";
        }
        if (!empty($name) && $length<2) {
            $errors[] = "Name is too short!";
        }
        if ($length>20) {
            $errors[] = "Name is too long!";
        }
        if (empty($email)) {
            $errors[] = "Email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email";
        }
        if (!empty($errors)) {
            throw new ValidationException($errors);
        }
    }
}
?>