<?php

namespace Core;

class Validator
{
    protected array $errors = [];

    public function validate(array $data, array $rules)
    {
        foreach ($rules as $field => $rule) {
            $rulesArray = explode('|', $rule);
            foreach ($rulesArray as $singleRule) {
                $value = $data[$field] ?? null;
                
                if ($singleRule === 'required' && empty($value)) {
                    $this->addError($field, "$field is required.");
                }

                if ($singleRule === 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($field, "$field must be a valid email.");
                }

                if (str_starts_with($singleRule, 'min:')) {
                    $min = explode(':', $singleRule)[1];
                    if (strlen($value) < $min) {
                        $this->addError($field, "$field must be at least $min characters.");
                    }
                }

                 if (str_starts_with($singleRule, 'max:')) {
                    $max = explode(':', $singleRule)[1];
                    if (strlen($value) > $max) {
                        $this->addError($field, "$field must not exceed $max characters.");
                    }
                }
            }
        }

        return $this;
    }

    public function addError($field, $message)
    {
        $this->errors[$field][] = $message;
    }

    public function fails()
    {
        return !empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }
}
