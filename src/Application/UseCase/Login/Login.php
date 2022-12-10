<?php

namespace App\Application\UseCase\Login;

use App\Application\UseCase\Login\LoginInput;
use App\Domain\Contract\LoginRepositoryContract;
use App\Domain\Entity\UserLogin;
use App\Domain\Entity\ValueObject\Password;
use App\Domain\Entity\ValueObject\Username;

class Login {
     
    public function __construct(private LoginRepositoryContract $loginRepositoryContract)
    {}

    public function execute(LoginInput $input) 
    {
        $login = new UserLogin();;
        $login->setloginUsername(new Username($input->usernameLogin));
        $login->setloginPassword(new Password($input->passwordLogin));

        $output = $this->loginRepositoryContract->save($login);
        return $output;


    }

}