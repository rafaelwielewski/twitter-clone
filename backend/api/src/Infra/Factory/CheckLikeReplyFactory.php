<?php

namespace App\Infra\Factory;

use App\Application\UseCase\Like\CheckLike;
use App\Infra\Controller\Controller;
use App\Infra\Controller\Handler;
use App\Infra\Controller\Like\CheckLikeController;
use App\Infra\Database\MySQL;
use App\Infra\Factory\Contract\ControllerFactoryContract;
use App\Infra\Repository\CheckLikeReplyRepositoryMySQL;

/**
 * @codeCoverageIgnore
 */
class CheckLikeReplyFactory implements ControllerFactoryContract {
    
    public static function getController(): Controller
    {
        return new Handler(
            new CheckLikeController(
                new CheckLike(
                    new CheckLikeReplyRepositoryMySQL(new MySQL)
                )
            )
        );    
    }
}