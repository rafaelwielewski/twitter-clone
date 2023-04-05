<?php

namespace App\Application\UseCase\Follow;

use App\Application\UseCase\Follow\FollowInput;
use App\Domain\Contract\UnfollowRepositoryContract;
use App\Domain\Entity\UserFollow;

class Unfollow {
     
    public function __construct(private UnfollowRepositoryContract $followRepositoryContract)
    {}

    public function execute(FollowInput $input) 
    {
        $follow = new UserFollow();
        $follow->setIduserCurrent($input->iduserCurrent);
        $follow->setIduserFollow($input->iduserFollow);

        $output = $this->followRepositoryContract->unfollow($follow);
        return $output;


    }

}