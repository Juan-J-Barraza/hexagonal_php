<?php

require_once __DIR__ . '/../Exeptions/InvalidUserIdExeption.php';


class UserId
{
    private $value;

    public function __construct($value)
    {
        $normalizedValue = trim((string) $value);
        if ($normalizedValue === '') {
            throw InvalidUserIdExeption::becauseUserIdIsEmpty();
        }

        $this->value = $normalizedValue;
    }

    public function value()
    {
        return $this->value;
    }
    public function equeals(UserId $other)
    {
        return $this->value === $other->value();
    }

    public function __tostring()
    {
        return $this->value;
    }

}

?>