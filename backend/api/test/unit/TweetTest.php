<?php
namespace Tests;

use App\Domain\Entity\Tweet;
use App\Domain\Entity\UserTweet;
use App\Domain\Entity\ValueObject\Name;
use App\Domain\Entity\ValueObject\Username;
use DateTime;
use DomainException;
use PHPUnit\Framework\TestCase;

class TweetTest extends TestCase {

    public function testShallCreateTweetObject()
    {
        $tweet = new Tweet();
        $tweet->setText('lorem ipsum ...');
        $tweet->setDate(new DateTime('2020-01-01T10:00:00'));
        $tweet->setUserTweet(new UserTweet(
            new Name('Thalys Wolf'),
            new Username('rafael')
        ));

        $this->assertSame('lorem ipsum ...', $tweet->getText());
        $this->assertSame('2020-01-01 10:00:00', $tweet->getDate());
        $this->assertSame('Thalys Wolf', $tweet->getTweetNameUser());
        $this->assertSame('rafael', $tweet->getTweetUsernameUser());
    }

    public function testShallThrowDomainExceptionIfTextCharactersAmountGreaterThan255Chars()
    {
        $this->expectException(DomainException::class);
        $tweet = new Tweet();
        $tweet->setText('lorem ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum');
    }

}
