<?php

require_once __DIR__ . '/../Exeptions/InvalidUserEmailExeption.php';


class UserEmail
{   
    private $value;

    public function __construct($value)
    {
        $normalizedValue = trim((string) $value);
        if ($normalizedValue === '') {
            throw InvalidUserEmailExeption::becauseEmailIsEmpty();
        }

        if (!filter_var($normalizedValue, FILTER_VALIDATE_EMAIL)) {
            throw InvalidUserEmailExeption::becauseFormatIsInvalid($normalizedValue);
        }

        $this->value = $normalizedValue;
    }

    public function value()
    {
        return $this->value;
    }

    public function equeals(UserEmail $other)
    {
        return $this->value === $other->value();
    }

    public function __tostring()
    {
        return $this->value;
    }
}



?>