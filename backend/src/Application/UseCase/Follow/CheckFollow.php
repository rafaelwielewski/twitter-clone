<?php

namespace App\Application\UseCase\Follow;

use App\Application\UseCase\Follow\FollowInput;
use App\Domain\Contract\CheckFollowRepositoryContract;
use App\Domain\Entity\UserFollow;

class CheckFollow {
     
    public function __construct(private CheckFollowRepositoryContract $followRepositoryContract)
    {}

    public function execute(FollowInput $input) 
    {
        $follow = new UserFollow();
        $follow->setIduserCurrent($input->iduserCurrent);
        $follow->setIduserFollow($input->iduserFollow);

        $output = $this->followRepositoryContract->checkfollow($follow);
        return $output;


    }

}