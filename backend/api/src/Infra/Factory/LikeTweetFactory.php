<?php

namespace App\Infra\Factory;

use App\Application\UseCase\Like\Like;
use App\Infra\Controller\Controller;
use App\Infra\Controller\Handler;
use App\Infra\Controller\Like\LikeController;
use App\Infra\Database\MySQL;
use App\Infra\Factory\Contract\ControllerFactoryContract;
use App\Infra\Repository\LikeTweetRepositoryMySQL;

/**
 * @codeCoverageIgnore
 */
class LikeTweetFactory implements ControllerFactoryContract {
    
    public static function getController(): Controller
    {
        return new Handler(
            new LikeController(
                new Like(
                    new LikeTweetRepositoryMySQL(new MySQL)
                )
            )
        );    
    }
}