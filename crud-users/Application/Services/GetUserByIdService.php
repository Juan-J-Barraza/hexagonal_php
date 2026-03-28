<?php

declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/GetUserByIdUseCase.php';
require_once __DIR__ . '/../Ports/Out/GetUserByIdPort.php';
require_once __DIR__ . '/Mappers/UserAplicationMapper.php';
require_once __DIR__ . '/../../Domain/Exeptions/UserNotFoundExeption.php';


final class GetUserByIdService implements GetUserByIdUseCase
{
    private GetUserByIdPort $getUserByIdPort;

    public function __construct(GetUserByIdPort $getUserByIdPort)
    {
        $this->getUserByIdPort = $getUserByIdPort;
    }

    public function execute(GetUserByIdQuery $query): UserModel
    {
        $userId = UserAplicationMapper::fromGetUserByIdQueryToUserId($query);
        $user = $this->getUserByIdPort->getById($userId);

        if (!$user) { // o === null
            throw  UserNotFoundException::becauseIdWasNotFound($userId->value());
        }

        return $user;
    }
}







?>