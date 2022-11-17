<?php
namespace Tests;

use App\Domain\Entity\UserLogin;
use App\Domain\Entity\ValueObject\Username;
use App\Domain\Entity\ValueObject\Password;
use PHPUnit\Framework\TestCase;

class UserLoginTest extends TestCase {

    public function testShallCreateUserLoginObject()
    {
        $login = new UserLogin();
        $login->setLoginUsername(new Username('rafael'));
        $login->setLoginPassword(new Password('Rafa12345'));

        $this->assertSame('rafael', $login->getLoginUsername());
        $this->assertSame('Rafa12345', $login->getLoginPassword());
    }


}
