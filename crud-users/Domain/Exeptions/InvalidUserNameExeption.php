<?php



class InvalidUserNameExeption extends InvalidArgumentException
{
    public static function becauseUserNameIsEmpty() {
        return new self('El nombre del usuario no puede estar vacío.');
    }

    public static function becauseUserNameIsTooShort($min) {
        return new self('El nombre del usuario debe tener al menos'. $min .'caracteres.');
    }
}

?>