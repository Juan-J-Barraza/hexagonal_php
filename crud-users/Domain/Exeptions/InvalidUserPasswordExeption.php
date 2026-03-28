<?php



class InvalidUserPasswordExeption extends InvalidArgumentException
{
    public static function becauseValueIsEmpty() {
        return new self('La contraseña no puede estar vacía');
    }

    public static function becauseValueIsTooShort($min) {
        return new self('La contraseña debe tener al menos' .$min .'caracteres');
    }
}






?>