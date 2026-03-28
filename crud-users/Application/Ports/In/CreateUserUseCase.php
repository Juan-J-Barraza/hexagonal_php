<?php

declare(strict_types=1);

require_once __DIR__ . '/../../Domain/Entities/UserModel.php';
require_once __DIR__ . '/../../Services/DTO/Commands/CreateUserCommand.php';


interface CreateUserUseCase
{
    public function execute(CreateUserCommand $command): UserModel;
}

?>