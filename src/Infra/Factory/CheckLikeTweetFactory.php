<?php

namespace App\Infra\Factory;

use App\Application\UseCase\Like\CheckLikeTweet;
use App\Infra\Controller\Controller;
use App\Infra\Controller\Handler;
use App\Infra\Controller\LikeTweet\CheckLikeTweetController;
use App\Infra\Database\MySQL;
use App\Infra\Factory\Contract\ControllerFactoryContract;
use App\Infra\Repository\CheckLikeTweetRepositoryMySQL;

/**
 * @codeCoverageIgnore
 */
class CheckLikeTweetFactory implements ControllerFactoryContract {
    
    public static function getController(): Controller
    {
        return new Handler(
            new CheckLikeTweetController(
                new CheckLikeTweet(
                    new CheckLikeTweetRepositoryMySQL(new MySQL)
                )
            )
        );    
    }
}