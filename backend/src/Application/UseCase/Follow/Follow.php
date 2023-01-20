<?php

namespace App\Application\UseCase\Follow;

use App\Application\UseCase\Follow\FollowInput;
use App\Domain\Contract\FollowRepositoryContract;
use App\Domain\Entity\UserFollow;

class Follow {
     
    public function __construct(private FollowRepositoryContract $followRepositoryContract)
    {}

    public function execute(FollowInput $input) 
    {
        $follow = new UserFollow();
        $follow->setIduserCurrent($input->iduserCurrent);
        $follow->setIduserFollow($input->iduserFollow);

        $output = $this->followRepositoryContract->follow($follow);
        return $output;


    }

}