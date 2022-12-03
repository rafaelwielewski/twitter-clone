<?php

namespace App\Application\UseCase\Like;

use App\Domain\Contract\LikeTweetRepositoryContract;
use App\Domain\Entity\Tweet;

Class CheckLikeTweet {

    public function __construct(private LikeTweetRepositoryContract $likeRepositoryContract)
    {}


    public function checkLikeTweet(LikeTweetInput $input){
        
        $like = new Tweet();
        $like->setTweetId($input->tweetId);
        $this->likeRepositoryContract->likeTweet($like);

    }
}
?>