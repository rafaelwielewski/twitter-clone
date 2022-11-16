<?php

namespace App\Application\UseCase\Register;

use App\Domain\Contract\RegisterRepositoryContract;;
use App\Domain\Entity\UserRegister;
use App\Domain\Entity\ValueObject\Name;
use App\Domain\Entity\ValueObject\Password;
use App\Domain\Entity\ValueObject\Username;
use DateTime;

class Register {

    public function __construct(private RegisterRepositoryContract $registerRepositoryContract)
    {}

    public function execute(RegisterInput $input) 
    {
        $register = new UserRegister();;
        $register->setDate(new DateTime());
        $register->setRegisterName(new Name($input->nameRegister));
        $register->setRegisterUsername(new Username($input->usernameRegister));
        $register->setRegisterPassword(new Password($input->passwordRegister));

        $this->registerRepositoryContract->save($register);
    }

}