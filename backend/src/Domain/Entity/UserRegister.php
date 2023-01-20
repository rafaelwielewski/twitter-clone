<?php
namespace App\Domain\Entity;

use App\Domain\Entity\ValueObject\Name;
use App\Domain\Entity\ValueObject\Password;
use App\Domain\Entity\ValueObject\Username;
use DateTime;

class UserRegister {
    
    private Name $nameRegister;
    private Username $usernameRegister;
    private Password $passwordRegister;

    public function setDate(DateTime $date)
    {
        $this->date = $date;
    }
    public function getDate(): string
    {
        return $this->date->format('Y-m-d H:i:s');
    }
    public function setRegisterName(Name $name)
    {
        $this->nameRegister = $name;
    }
    public function getRegisterName()
    {
        return $this->nameRegister->getName();
    }
    public function setRegisterUsername(Username $username)
    {
        $this->usernameRegister = $username;
    }
    public function getRegisterUsername()
    {
        return $this->usernameRegister->getUsername();
    }
    public function setRegisterPassword(Password $password)
    {
        $this->passwordRegister = $password;
    }
    public function getRegisterPassword(): string
    {
        return $this->passwordRegister->getPassword();
    }
    
}
