<?php
namespace Tests;

use App\Domain\Entity\ValueObject\Username;
use PHPUnit\Framework\TestCase;
use DomainException;

class UsernameTest extends TestCase {

    public function testShallCreateTweetObject()
    {
        $username = new Username('rafael');
        $this->assertSame('rafael', $username->getUsername());
    }

    public function testShallThrowDomainExceptionIfUsernameCharactersAmountGreaterThan15Chars()
    {
        $this->expectException(DomainException::class);
        $username = new Username('kljkljkljkljkljkljkljkl');
    }
}
