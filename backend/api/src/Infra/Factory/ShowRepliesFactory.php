<?php

namespace App\Infra\Factory;

use App\Application\UseCase\ShowOneTweet\ShowOneTweet;
use App\Application\UseCase\ShowReplies\ShowReplies;
use App\Infra\Controller\Controller;
use App\Infra\Controller\Handler;
use App\Infra\Controller\ShowOneTweet\ShowOneTweetController;
use App\Infra\Controller\ShowReplies\ShowRepliesController;
use App\Infra\Database\MySQL;
use App\Infra\Factory\Contract\ControllerFactoryContract;
use App\Infra\Repository\ShowOneTweetRepositoryMySQL;
use App\Infra\Repository\ShowRepliesRepositoryMySQL;

/**
 * @codeCoverageIgnore
 */
class ShowRepliesFactory implements ControllerFactoryContract 
{

    public static function getController(): Controller
    {
        return new Handler(
            new ShowRepliesController(
                new ShowReplies(
                    new ShowRepliesRepositoryMySQL(new MySQL)
                )
            )
        )
        ;

    }
    

}