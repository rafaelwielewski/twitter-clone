<?php

namespace App\Application\UseCase\Like;

use App\Domain\Contract\LikeRepositoryContract;
use App\Domain\Entity\Tweet;
use App\Domain\Entity\ValueObject\Iduser;

Class Like {

    public function __construct(private LikeRepositoryContract $likeRepositoryContract)
    {}


    public function execute(LikeInput $input){
        
        $like = new Tweet();
        $like->setTweetId($input->tweetId);
        $like->setTweetIduser(new Iduser($input->userid));
        return $this->likeRepositoryContract->like($like);

    }
}
?>