<?php

namespace App\Infra\Factory;

use App\Application\UseCase\Follow\CheckFollow;
use App\Infra\Controller\Controller;
use App\Infra\Controller\Follow\FollowController;
use App\Infra\Controller\Handler;
use App\Infra\Database\MySQL;
use App\Infra\Factory\Contract\ControllerFactoryContract;
use App\Infra\Repository\Follow\CheckFollowRepositoryMySQL;

class CheckFollowFactory implements ControllerFactoryContract {
    
    public static function getController(): Controller
    {
        return new Handler(
            new FollowController(
                new CheckFollow(
                    new CheckFollowRepositoryMySQL(new MySQL)
                )
            )
        );
    }

}