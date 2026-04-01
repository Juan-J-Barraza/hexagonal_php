<?php

declare(strict_types=1);

final class ClassLoader
{
    /**
     * @var array<string, string>
     */
    private static array $classMap = array(
        'InvalidUserEmailException' => 'crud-users/Domain/Exeptions/InvalidUserEmailExeption.php',
        'InvalidUserIdException' => 'crud-users/Domain/Exeptions/InvalidUserIdExeption.php',
        'InvalidUserNameException' => 'crud-users/Domain/Exeptions/InvalidUserNameExeption.php',
        'InvalidUserPasswordException' => 'crud-users/Domain/Exeptions/InvalidUserPasswordExeption.php',
        'InvalidUserRoleException' => 'crud-users/Domain/Exeptions/InvalidUserRoleExeption.php',
        'InvalidUserStatusException' => 'crud-users/Domain/Exeptions/InvalidUserStatusExeption.php',
        'UserAlreadyExistsException' => 'crud-users/Domain/Exeptions/UserAlreadyExistExeption.php',
        'UserNotFoundException' => 'crud-users/Domain/Exeptions/UserNotFoundExeption.php',
        'InvalidCredentialsException' => 'crud-users/Domain/Exeptions/InvalidCredentialsException.php',

        'UserRoleEnum' => 'crud-users/Domain/Enums/UserRoleEnum.php',
        'UserStatusEnum' => 'crud-users/Domain/Enums/UserStatusEnum.php',

        'UserId' => 'crud-users/Domain/ValueObjects/UserId.php',
        'UserName' => 'crud-users/Domain/ValueObjects/UserName.php',
        'UserEmail' => 'crud-users/Domain/ValueObjects/UserEmail.php',
        'UserPassword' => 'crud-users/Domain/ValueObjects/UserPassword.php',

        'UserModel' => 'crud-users/Domain/Models/UserModel.php',

        'CreateUserUseCase' => 'crud-users/Application/Ports/In/CreateUserUseCase.php',
        'UpdateUserUseCase' => 'crud-users/Application/Ports/In/UpdateUserUseCase.php',
        'GetUserByIdUseCase' => 'crud-users/Application/Ports/In/GetUserByIdUseCase.php',
        'GetAllUsersUseCase' => 'crud-users/Application/Ports/In/GetAllUserUseCase.php',
        'DeleteUserUseCase' => 'crud-users/Application/Ports/In/DeleteUserUseCase.php',
        'LoginUseCase' => 'crud-users/Application/Ports/In/LoginUseCase.php',

        'SaveUserPort' => 'crud-users/Application/Ports/Out/SaveUserPort.php',
        'UpdateUserPort' => 'crud-users/Application/Ports/Out/UpdateUserPort.php',
        'GetUserByIdPort' => 'crud-users/Application/Ports/Out/GetUserByIdPort.php',
        'GetUserByEmailPort' => 'crud-users/Application/Ports/Out/GetUserByEmailPort.php',
        'GetAllUsersPort' => 'crud-users/Application/Ports/Out/GetAllUsersPort.php',
        'DeleteUserPort' => 'crud-users/Application/Ports/Out/DeleteUserPort.php',

        'CreateUserCommand' => 'crud-users/Application/Services/DTO/Commands/CreateUserCommand.php',
        'UpdateUserCommand' => 'crud-users/Application/Services/DTO/Commands/UpdateUserCommand.php',
        'DeleteUserCommand' => 'crud-users/Application/Services/DTO/Commands/DeleteUserCommand.php',
        'LoginCommand' => 'crud-users/Application/Services/DTO/Commands/LoginCommand.php',
        'GetUserByIdQuery' => 'crud-users/Application/Services/DTO/Queries/GetUserByIdQuery.php',
        'GetAllUsersQuery' => 'crud-users/Application/Services/DTO/Queries/GetAllUsersQuery.php',

        'CreateUserService' => 'crud-users/Application/Services/CreateUserService.php',
        'UpdateUserService' => 'crud-users/Application/Services/UpdateUserService.php',
        'GetUserByIdService' => 'crud-users/Application/Services/GetUserByIdService.php',
        'GetAllUsersService' => 'crud-users/Application/Services/GetAllUserService.php',
        'DeleteUserService' => 'crud-users/Application/Services/DeleteUserService.php',
        'LoginService' => 'crud-users/Application/Services/LoginService.php',
        'UserApplicationMapper' => 'crud-users/Application/Services/Mappers/UserAplicationMapper.php',

        'Connection' => 'crud-users/Infraestructure/Adapters/Persistence/MYSQL/Config/Connection.php',
        'UserPersistenceDto' => 'crud-users/Infraestructure/Adapters/Persistence/MYSQL/Dto/UserPersistenceDto.php',
        'UserEntity' => 'crud-users/Infraestructure/Adapters/Persistence/MYSQL/Entity/UserEntity.php',
        'UserPersistenceMapper' => 'crud-users/Infraestructure/Adapters/Persistence/MYSQL/Mapper/UserPersistenceMapper.php',
        'UserRepositoryMySQL' => 'crud-users/Infraestructure/Adapters/Persistence/MYSQL/Repository/UserRepositoryMYSQL.php',

        'CreateUserWebRequest' => 'crud-users/Infraestructure/Entrypoints/Web/Contollers/Dto/CreateUserWebRequest.php',
        'UpdateUserWebRequest' => 'crud-users/Infraestructure/Entrypoints/Web/Contollers/Dto/UpdateUserWebRequest.php',
        'LoginWebRequest' => 'crud-users/Infraestructure/Entrypoints/Web/Contollers/Dto/LoginWebRequest.php',
        'UserResponse' => 'crud-users/Infraestructure/Entrypoints/Web/Contollers/Dto/UserResponse.php',
        'UserWebMapper' => 'crud-users/Infraestructure/Entrypoints/Web/Contollers/Mapper/WebRoutes.php',
        'UserController' => 'crud-users/Infraestructure/Entrypoints/Web/Contollers/UserController.php',
        'WebRoutes' => 'crud-users/Infraestructure/Entrypoints/Web/Contollers/Config/WebRoutes.php',

        'View' => 'crud-users/Infraestructure/Entrypoints/Web/Presentation/View.php',
        'Flash' => 'crud-users/Infraestructure/Entrypoints/Web/Presentation/Flash.php',

        'DependencyInjection' => 'Common/DependencyInjection.php',
    );

    public static function register(): void
    {
        spl_autoload_register(array(self::class, 'loadClass'));
    }

    public static function loadClass(string $className): void
    {
        if (!isset(self::$classMap[$className])) {
            return;
        }

        $baseDir = dirname(__DIR__) . DIRECTORY_SEPARATOR;
        $filePath = $baseDir . self::$classMap[$className];

        if (!file_exists($filePath)) {
            throw new RuntimeException(
                sprintf('No se encontró el archivo para la clase %s en %s', $className, $filePath)
            );
        }

        require_once $filePath;
    }
}






?>