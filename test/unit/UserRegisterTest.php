<?php
namespace Tests;

use App\Domain\Entity\UserRegister;
use App\Domain\Entity\ValueObject\Name;
use App\Domain\Entity\ValueObject\Username;
use App\Domain\Entity\ValueObject\Password;
use DateTime;
use PHPUnit\Framework\TestCase;

class UserRegisterTest extends TestCase {

    public function testShallCreateTweetObject()
    {
        $register = new UserRegister();
        $register->setDate(new DateTime('2020-01-01T10:00:00'));
        $register->setRegisterName(new Name('Thalys Wolf'));
        $register->setRegisterUsername(new Username('rafael'));
        $register->setRegisterPassword(new Password('Rafa12345'));

        $this->assertSame('2020-01-01 10:00:00', $register->getDate());
        $this->assertSame('Thalys Wolf', $register->getRegisterName());
        $this->assertSame('rafael', $register->getRegisterUsername());
        $this->assertSame('Rafa12345', $register->getRegisterPassword());
    }


}
