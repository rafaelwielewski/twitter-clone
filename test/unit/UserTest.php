<?php
namespace Tests;

use App\Domain\Entity\User;
use App\Domain\Entity\ValueObject\Name;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {

    public function testShallCreateUserObject()
    {
        $user = new User();
        $user->setName(new Name('Nome usuario'));
       
        $this->assertSame('Nome usuario', $user->getName());
    }

    public function testShallGetJustFirstName()
    {
        $user = new User();
        $user->setName(new Name('Thalys Wolf'));
       
        $this->assertSame('Thalys', $user->getFirstName());
    }

    public function testShallGetJustLastName()
    {
        $user = new User();
        $user->setName(new Name('Thalys Wolf'));
       
        $this->assertSame('Wolf', $user->getLastName());
    }

    public function testShallGetJustLastNameWithNameAndSecondName()
    {
        $user = new User();
        $user->setName(new Name('Thalys Antonio Wolf'));
       
        $this->assertSame('Wolf', $user->getLastName());
    }

}

