<?php
declare(strict_types=1);

require_once __DIR__ . '/../../../Domain/ValueObjects/UserId.php';


interface UpdateUserPort
{
    public function update(UserId $userId): void;
}




?>