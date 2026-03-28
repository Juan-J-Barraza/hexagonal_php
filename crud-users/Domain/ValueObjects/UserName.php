<?php

require_once __DIR__ . '/../Exeptions/InvalidUserNameExeption.php';


class UserName
{
    private $value;

    public function __construct($value)
    {
        $normalizedValue = trim((string) $value);
        if ($normalizedValue === '') {
            throw InvalidUserNameExeption::becauseUserNameIsEmpty();
        }

        if (mb_strlen($normalizedValue) < 3) {
            throw InvalidUserNameExeption::becauseUserNameIsTooShort(3);
        }

        $this->value = $normalizedValue;
    }

    public function value()
    {
        return $this->value;
    }

    public function equeals(UserName $other)
    {
        return $this->value === $other->value();
    }
    public function __tostring()
    {
        return $this->value;
    }
}









?>