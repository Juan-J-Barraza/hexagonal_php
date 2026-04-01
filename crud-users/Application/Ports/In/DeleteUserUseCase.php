<?php
declare(strict_types=1);
require_once __DIR__ . '/../../Services/DTO/Commands/DeleteUserCommand.php';
interface DeleteUserUseCase
{
    public function execute(DeleteUserCommand $command): void;
}

?>