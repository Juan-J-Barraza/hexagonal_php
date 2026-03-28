<?php


class InvalidUserIdExeption extends InvalidArgumentException
{
    public static function becauseUserIdIsEmpty() {
        return new self('El id del usuario no puede estar vacío.');
    }
}

?>