<?php

namespace App\Application\UseCase\Like;

use App\Domain\Contract\CheckLikeTweetRepositoryContract;
use App\Domain\Entity\Tweet;
use App\Domain\Entity\ValueObject\Iduser;

Class CheckLikeTweet {

    public function __construct(private CheckLikeTweetRepositoryContract $checkLikeRepositoryContract)
    {}


    public function execute(LikeTweetInput $input){
        
        $like = new Tweet();
        $like->setTweetId($input->tweetId);
        $like->setTweetIduser(new Iduser($input->userid));
        return $this->checkLikeRepositoryContract->checkLikeTweet($like);


    }
}
?>