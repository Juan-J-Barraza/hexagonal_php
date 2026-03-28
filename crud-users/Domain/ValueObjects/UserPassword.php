<?php
require_once __DIR__ . '/../Exeptions/InvalidUserPasswordExeption.php';


class UserPassword
{
    private string $password;

    public function __construct(string $password)
    {
        $normalizedPassword = trim($password);

        if ($normalizedPassword === '') {
            throw InvalidUserPasswordExeption::becauseValueIsEmpty();
        }

        if (strlen($normalizedPassword) < 8) {
            throw InvalidUserPasswordExeption::becauseValueIsTooShort(8);
        }

        $this->password = $normalizedPassword;
    }

    public function passwordValue(): string
    {
        return $this->password;
    }

    public function equals(UserPassword $other): bool
    {
        return $this->password === $other->passwordValue();
    }

    public function __toString(): string
    {
        return $this->password;
    }


    
}



?>