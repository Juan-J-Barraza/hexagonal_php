<?php


require_once __DIR__ . '/../Exeptions/InvalidUserRoleExeption.php';


class UserRoleEnum
{
    const ADMIN = 'admin';
    const MEMBER = 'MEMBER';
    const REVIEWER = 'REVIEWER';

    public static function values()
    {
        return array(
            self::ADMIN,
            self::MEMBER,
            self::REVIEWER
        );
    }

    public static function isValid($value)
    {
        return in_array($value, self::values(), true);
    }

    public static function validate($value)
    {
        if (!self::isValid($value)) {
            throw InvalidUserRoleException::becauseValueIsInvalid($value);
        }
    }
}




?>