<?php
namespace App\Domain\Entity;

use App\Domain\Entity\ValueObject\Name;
use App\Domain\Entity\ValueObject\Password;
use App\Domain\Entity\ValueObject\Username;

class User {

    private Name $userName;
    private Username $userUsername;
    private Password $userPassword;

    public function __construct()
    {}

    public function setUserName(Name $name)
    {
        $this->userName = $name;
    }
    public function getUserName(): string
    {
        return $this->userName->getName();
    }
    public function setUserUsername(Username $username)
    {
        $this->userUsername = $username;
    }
    public function getUserUsername(): string
    {
        return $this->userUsername->getUsername();
    }
    public function setUserPassword(Password $password)
    {
        $this->userPassword = $password;
    }
    public function getUserPassword(): string
    {
        return $this->userPassword->getPassword();
    }
    
}
