<?php
namespace Tests;

use App\Domain\Entity\ValueObject\Password;
use PHPUnit\Framework\TestCase;
use DomainException;

class PasswordTest extends TestCase {

    public function testShallCreateTweetObject()
    {
        $password = new Password('Rafa12345');
        $this->assertSame('Rafa12345', $password->getPassword());
    }

    public function testShallThrowDomainExceptionHasAtLeastOneNumberAtLeastOneLowercaseLetterAtLeastOneCapitalLetterFrom8To36Characters()
    {
        $this->expectException(DomainException::class);
        $password = new Password('hjgjh');
    }
}
