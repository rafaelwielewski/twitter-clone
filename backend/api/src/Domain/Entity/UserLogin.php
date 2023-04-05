<?php
namespace App\Domain\Entity;

use App\Domain\Entity\ValueObject\Password;
use App\Domain\Entity\ValueObject\Username;

class UserLogin {
    

    private Username $usernameLogin;
    private Password $passwordLogin;

   
    public function setLoginUsername(Username $username)
    {
        $this->usernameLogin = $username;
    }
    public function getLoginUsername()
    {
        return $this->usernameLogin->getUsername();
    }
    public function setLoginPassword(Password $password)
    {
        $this->passwordLogin = $password;
    }
    public function getLoginPassword(): string
    {
        return $this->passwordLogin->getPassword();
    }
    
}
