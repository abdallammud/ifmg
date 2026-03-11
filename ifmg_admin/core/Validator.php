<?php
/**
 * Validator class
 */

class Validator
{
    public static function validate($data, $rules)
    {
        $errors = [];
        foreach ($rules as $field => $fieldRules) {
            foreach ($fieldRules as $rule) {
                if ($rule == 'required' && empty($data[$field])) {
                    $errors[$field][] = "The $field field is required.";
                }
                if ($rule == 'email' && !filter_var($data[$field], FILTER_VALIDATE_EMAIL)) {
                    $errors[$field][] = "The $field must be a valid email address.";
                }
            }
        }
        return $errors;
    }
}
