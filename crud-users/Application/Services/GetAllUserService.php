<?php
declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/GetAllUserUseCase.php';
require_once __DIR__ . '/../Ports/Out/GetAllUsersPort.php';



final class GetAllUsersService implements GetAllUserUseCase
{

    private GetAllUsersPort $getAllUserPort;

    public function __construct(GetAllUsersPort $getAllUserPort)
    {
        $this->getAllUserPort = $getAllUserPort;
    }

    public function execute(GetAllUsersQuery $query): array
    {
        return $this->getAllUserPort->getAll();
    }


}


?>