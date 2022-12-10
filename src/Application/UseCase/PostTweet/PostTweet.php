<?php

namespace App\Application\UseCase\PostTweet;

use App\Domain\Contract\TweetRepositoryContract;
use App\Domain\Entity\Tweet;
use App\Domain\Entity\ValueObject\Iduser;
use App\Domain\Entity\ValueObject\Name;
use App\Domain\Entity\ValueObject\Username;
use DateTime;

class PostTweet {

    public function __construct(private TweetRepositoryContract $tweetRepositoryContract)
    {}

    public function execute(PostTweetInput $input) 
    {
        $tweet = new Tweet();
        $tweet->setTweetText($input->text);
        $tweet->setTweetIduser(new Iduser($input->iduser));
        $tweet->setTweetName(new Name($input->name));
        $tweet->setTweetUsername(new Username ($input->username));
        $tweet->setDate(new DateTime());

        $this->tweetRepositoryContract->save($tweet);
    }

}
