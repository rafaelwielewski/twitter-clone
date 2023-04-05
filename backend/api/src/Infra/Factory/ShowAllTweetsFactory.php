<?php

namespace App\Infra\Factory;

use App\Application\UseCase\ShowAllTweets\ShowAllTweets;
use App\Infra\Controller\Controller;
use App\Infra\Controller\Handler;
use App\Infra\Controller\ShowAllTweets\ShowAllTweetsController;
use App\Infra\Database\MySQL;
use App\Infra\Factory\Contract\ControllerFactoryContract;
use App\Infra\Repository\ShowAllTweetsRepositoryMySQL;

/**
 * @codeCoverageIgnore
 */
class ShowAllTweetsFactory implements ControllerFactoryContract 
{

    public static function getController(): Controller
    {
        return new Handler(
            new ShowAllTweetsController(
                new ShowAllTweets(
                    new ShowAllTweetsRepositoryMySQL(new MySQL)
                )
            )
        )
        ;

    }
    

}