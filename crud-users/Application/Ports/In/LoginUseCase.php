<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../Domain/Models/UserModel.php';
require_once __DIR__ . '/../../Services/DTO/Commands/LoginCommand.php';




interface LoginUseCase
{
    public function execute(LoginCommand $command): UserModel;
}


?>