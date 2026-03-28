<?php


class   InvalidUserEmailExeption extends InvalidArgumentException {

    public static function becauseFormatIsInvalid($email) {
        return new self('El formato del correo electrónico es inválido: ' . $email);
    }

    public static function becauseEmailIsEmpty() {
        return new self('El correo electrónico no puede estar vacío.');
    }
}


?>