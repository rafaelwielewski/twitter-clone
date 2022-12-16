<?php

namespace App\Infra\Factory;

use App\Application\UseCase\ShowOneTweet\ShowOneTweet;
use App\Infra\Controller\Controller;
use App\Infra\Controller\Handler;
use App\Infra\Controller\ShowOneTweet\ShowOneTweetController;
use App\Infra\Database\MySQL;
use App\Infra\Factory\Contract\ControllerFactoryContract;
use App\Infra\Repository\ShowOneTweetRepositoryMySQL;

/**
 * @codeCoverageIgnore
 */
class ShowOneTweetFactory implements ControllerFactoryContract 
{

    public static function getController(): Controller
    {
        return new Handler(
            new ShowOneTweetController(
                new ShowOneTweet(
                    new ShowOneTweetRepositoryMySQL(new MySQL)
                )
            )
        )
        ;

    }
    

}