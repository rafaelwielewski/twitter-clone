<?php
namespace App\Domain\Entity;

use App\Infra\Repository\LoginRepositoryMySQL;

class Session {
    
    public function __construct(LoginRepositoryMySQL $results)
    {
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $results["desname"];
		$_SESSION['username'] = $results["deslogin"];
		$_SESSION['password'] = $results["despassword"];
        var_dump($_SESSION);
    }


    public function setSessionPassword(LoginRepositoryMySQL $results)
    {
        $this->$_SESSION['password'] = $results["despassword"];
        
    }
    public function getLoginPassword(): string
    {
        return $this->passwordLogin->getPassword();
    }
    
}
