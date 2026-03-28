<?php
declare(strict_types=1);

require_once __DIR__ . '/../../../Domain/Models/UserModel.php';
require_once __DIR__ . '/../../Services/DTO/Commands/UpdateUserCommand.php';


interface UpdateUserUseCase
{
    public function execute(UpdateUserCommand $command): UserModel;
}





?>