<?php
namespace Tests;

use App\Domain\Entity\ValueObject\Name;
use PHPUnit\Framework\TestCase;

class NameTest extends TestCase {

    public function testShallCreateTweetObject()
    {
        $name = new Name('Thalys Wolf');
        $this->assertSame('Thalys Wolf', $name->getName());
        $this->assertSame('Thalys', $name->getFirstName());
        $this->assertSame('Wolf', $name->getLastName());
    }

}
