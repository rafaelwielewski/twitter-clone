<?php

namespace App\Application\UseCase\PostTweet;

use App\Domain\Contract\TweetRepositoryContract;
use App\Domain\Entity\Tweet;
use App\Domain\Entity\UserTweet;
use App\Domain\Entity\ValueObject\Name;
use App\Domain\Entity\ValueObject\Username;
use DateTime;

class PostTweet {

    public function __construct(private TweetRepositoryContract $tweetRepositoryContract)
    {}

    public function execute(PostTweetInput $input) 
    {
        $tweet = new Tweet();
        $tweet->setText($input->text);
        $tweet->setDate(new DateTime());
        $tweet->setUserTweet(new UserTweet(
            new Name($input->NameUser),
            new Username($input->UsernameUser)
        ));

        $this->tweetRepositoryContract->save($tweet);
    }

}
