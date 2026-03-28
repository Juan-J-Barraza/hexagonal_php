<?php
declare(strict_types=1);

require_once __DIR__ . '/../../../Domain/Models/UserModel.php';
require_once __DIR__ . '/../../Services/DTO/Queries/GetAllUsersQuery.php';


interface GetAllUserUseCase
{
    /**
     * @return UserModel[]
     */
    public function execute(GetAllUsersQuery $query): array;
}

?>