<?php
declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/UpdateUserUseCase.php';
require_once __DIR__ . '/../Ports/Out/UpdateUserPort.php';
require_once __DIR__ . '/../Ports/Out/GetUserByIdPort.php';
require_once __DIR__ . '/../Ports/Out/GetUserByEmailPort.php';
require_once __DIR__ . '/Mappers/UserAplicationMapper.php';
require_once __DIR__ . '/../../Domain/Exeptions/UserAlreadyExistExeption.php';
require_once __DIR__ . '/../../Domain/Exeptions/UserNotFoundExeption.php';
require_once __DIR__ . '/../../Domain/Models/UserModel.php';
require_once __DIR__ . '/../../Domain/ValueObjects/UserId.php';
require_once __DIR__ . '/../../Domain/ValueObjects/UserName.php';
require_once __DIR__ . '/../../Domain/ValueObjects/UserEmail.php';
require_once __DIR__ . '/../../Domain/ValueObjects/UserPassword.php';


final class UpdateUserService implements UpdateUserUseCase
{
    private UpdateUserPort $updateUserPort;
    private GetUserByIdPort $getUserByIdPort;
    private GetUserByEmailPort $getUserByEmailPort;


    public function __construct(
        UpdateUserPort $updateUserPort,
        GetUserByIdPort $getUserByIdPort,
        GetUserByEmailPort $getUserByEmailPort
    ) {
        $this->updateUserPort = $updateUserPort;
        $this->getUserByIdPort = $getUserByIdPort;
        $this->getUserByEmailPort = $getUserByEmailPort;
    }


    public function execute(UpdateUserCommand $command): UserModel
    {
        $userId = new UserId($command->getId());
        $currentUser = $this->getUserByIdPort->getById($userId);

        if ($currentUser === null) {
            throw UserNotFoundException::becauseIdWasNotFound($userId->value());
        }

        $newEmail = new UserEmail($command->getEmail());
        $userWithSameEmail = $this->getUserByEmailPort->getByEmail($newEmail);

        if ($userWithSameEmail !== null && !$userWithSameEmail->id()->equeals($userId)) {
            throw UserAlreadyExistsException::becauseEmailAlreadyExists($newEmail->value());
        }

        $password = ($command->getPassword() !== '')
                ? new UserPassword($command->getPassword())
                : $currentUser->password();

        $userToUpdate = new UserModel( 
            $userId,
            new UserName($command->getName()),
            new UserEmail($command->getEmail()),
            $password,
            $command->getRole(),
            $command->getStatus()
        );

        return $this->updateUserPort->update($userToUpdate);
    }
}

?>