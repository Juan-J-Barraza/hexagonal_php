<?php

require_once __DIR__ . '/EventDomain.php';
require_once __DIR__ . '/../ValueObjects/UserId.php';

class UserDeletedDomainEvent extends EventDomain
{
    private $userId;
    public function __construct(UserId $userId)
    {
        parent::__construct('User.deleted');
        $this->userId = $userId;
    }

    public function userId()
    {
        return $this->userId;
    }

    public function payload()
    {
        return array(
            'id' => $this->userId->value()
        );
    }

}










?>