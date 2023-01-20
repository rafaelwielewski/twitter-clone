<?php

namespace App\Application\UseCase\Like;

use App\Domain\Contract\LikeTweetRepositoryContract;
use App\Domain\Entity\Tweet;

Class LikeTweet {

    public function __construct(private LikeTweetRepositoryContract $likeRepositoryContract)
    {}


    public function execute(LikeTweetInput $input){
        
        $like = new Tweet();
        $like->setTweetId($input->tweetId);
        $this->likeRepositoryContract->likeTweet($like);

    }
}
?>