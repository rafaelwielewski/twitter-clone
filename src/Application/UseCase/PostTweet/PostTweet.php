<?php

namespace App\Application\UseCase\PostTweet;

use App\Domain\Contract\TweetRepositoryContract;
use App\Domain\Entity\Tweet;
use DateTime;

class PostTweet {

    public function __construct(private TweetRepositoryContract $tweetRepositoryContract)
    {}

    public function execute(PostTweetInput $input) 
    {
        $tweet = new Tweet();
        $tweet->setText($input->text);
        $tweet->setDate(new DateTime());

        $this->tweetRepositoryContract->save($tweet);
    }

}
