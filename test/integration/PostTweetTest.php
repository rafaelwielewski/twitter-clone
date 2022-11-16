<?php
namespace Tests;

use App\Application\UseCase\PostTweet\PostTweet;
use App\Application\UseCase\PostTweet\PostTweetInput;
use App\Infra\Database\MySQL;
use App\Infra\Repository\TweetRepositoryMySQL;
use App\Infra\ThirdParty\Env\PhpDotEnvAdapter;
use PHPUnit\Framework\TestCase;

class PostTweetTest extends TestCase {

    public function testShallPostTweet()
    {
        PhpDotEnvAdapter::load(__DIR__ . '/../../');

        $mysql = $this->createMock(MySQL::class);
        $mysql->method('execute');
        //$mysql = new MySQL();

        $postTweet = new PostTweet(
            new TweetRepositoryMySQL($mysql)
        );

        $input = new PostTweetInput();
        $input->text = 'texto do tweet';
        $input->NameUser = 'Thalys Wolf';
        $input->UsernameUser = 'rafael';

        $this->assertEmpty($postTweet->execute($input));
    }

}
