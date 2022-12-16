<?php

namespace App\Application\UseCase\Like;

use App\Domain\Contract\CheckLikeRepositoryContract;
use App\Domain\Entity\Tweet;
use App\Domain\Entity\ValueObject\Iduser;

Class CheckLike {

    public function __construct(private CheckLikeRepositoryContract $checkLikeRepositoryContract)
    {}


    public function execute(LikeInput $input){
        
        $like = new Tweet();
        $like->setTweetId($input->tweetId);
        $like->setTweetIduser(new Iduser($input->userid));
        return $this->checkLikeRepositoryContract->checkLike($like);


    }
}
?>