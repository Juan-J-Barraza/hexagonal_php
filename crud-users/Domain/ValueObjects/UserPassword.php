<?php
require_once __DIR__ . '/../Exeptions/InvalidUserPasswordExeption.php';


class UserPassword
{
    private string $password;

    public function __construct(string $hashedPassword)
    {
        $this->password = $hashedPassword;
    }

    public static function fromPlainText(string $plainText): self
    {
        $normalized = trim($plainText);

        if ($normalized === '') {
            throw InvalidUserPasswordExeption::becauseValueIsEmpty();
        }

        if (strlen($normalized) < 8) {
            throw InvalidUserPasswordExeption::becauseValueIsTooShort(8);
        }

        return new self(password_hash($normalized, PASSWORD_BCRYPT));
    }

    public function verifyPlainPassword(string $plainText): bool
    {
        return password_verify($plainText, $this->password);
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