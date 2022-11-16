<?php
namespace App\Domain\Entity;

use App\Infra\Repository\LoginRepositoryMySQL;

class Session {
    
    public function __construct(LoginRepositoryMySQL $session)
    {
        Var_dump($session);
    }

   /* public function getPassword(): string
    {
        return $this->password;
    }

   
    public function setLoginUsername(Username $username)
    {
        $this->usernameLogin = $username;
    }
    public function getLoginUsername()
    {
        return $this->usernameLogin->getUsername();
    }
    public function setSessionPassword(LoginRepositoryMySQL $login)
    {
        $this->sessionLogin = $login;
        var_dump($sessionLogin);
    }
    public function getLoginPassword(): string
    {
        return $this->passwordLogin->getPassword();
    }*/
    
}
