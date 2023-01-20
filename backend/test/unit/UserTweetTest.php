<?php
namespace Tests;


use App\Domain\Entity\UserTweet;
use App\Domain\Entity\ValueObject\Name;
use App\Domain\Entity\ValueObject\Username;
use PHPUnit\Framework\TestCase;

class UserTweetTest extends TestCase {

    public function testShallCreateObject()
    {
        $userTweet = new UserTweet(
            new Name('Thalys Wolf'),
            new Username('rafael')
    );
        $this->assertSame('Thalys Wolf', $userTweet->getTweetNameUser());
        $this->assertSame('rafael', $userTweet->getTweetUsernameUser());
    }

}
