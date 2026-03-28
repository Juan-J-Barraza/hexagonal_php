<?php

require_once __DIR__ . '/EventDomain.php';
require_once __DIR__ . '/../Models/UserModel.php';

class UserCreateDomainEvent extends EventDomain
{
    private $user;

    public function __construct(UserModel $user)
    {
        parent::__construct('User.created');
        $this->user = $user;
    }

    public function user()
    {
        return $this->user;
    }

    public function payload()
    {
        return array(
            'id' => $this->user->id(),
            'name' => $this->user->name(),
            'email' => $this->user->email(),
            'role' => $this->user->role(),
            'status' => $this->user->status()
        );
    }
}







?>