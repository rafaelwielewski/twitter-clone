<?php

namespace App\Infra\Factory;

use App\Application\UseCase\Follow\Follow;
use App\Infra\Controller\Controller;
use App\Infra\Controller\Follow\FollowController;
use App\Infra\Controller\Handler;
use App\Infra\Database\MySQL;
use App\Infra\Factory\Contract\ControllerFactoryContract;
use App\Infra\Repository\Follow\FollowRepositoryMySQL;

class FollowFactory implements ControllerFactoryContract {
    
    public static function getController(): Controller
    {
        return new Handler(
            new FollowController(
                new Follow(
                    new FollowRepositoryMySQL(new MySQL)
                )
            )
        );
    }

}