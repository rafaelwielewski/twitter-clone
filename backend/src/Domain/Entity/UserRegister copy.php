<?php
namespace App\Domain\Entity;

use DateTime;

class UserRegister2 {
    
    private User $UserRegister;

    private DateTime $date;

    public function setDate(DateTime $date)
    {
        $this->date = $date;
    }
    public function getDate(): string
    {
        return $this->date->format('Y-m-d H:i:s');
    }
    public function setUserRegister(User $UserRegister)
    {
        $this->UserRegister = $UserRegister;
    }
    public function getRegisterName()
    {
        return $this->UserRegister->getUserName();
    }
    public function getRegisterUsername()
    {
        return $this->UserRegister->getUserUsername();
    }
    public function getRegisterPassword(): string
    {
        return $this->UserRegister->getUserPassword();
    }
    
}
