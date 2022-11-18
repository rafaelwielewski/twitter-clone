<?php

namespace App\Infra\Factory;

use App\Application\UseCase\ShowUserTweets\ShowUserTweets;
use App\Infra\Controller\Controller;
use App\Infra\Controller\Handler;
use App\Infra\Controller\ShowUsertweets\ShowUsertweetsController;
use App\Infra\Database\MySQL;
use App\Infra\Factory\Contract\ControllerFactoryContract;
use App\Infra\Repository\ShowUserTweetsRepositoryMySQL;

/**
 * @codeCoverageIgnore
 */
class ShowUserTweetsFactory implements ControllerFactoryContract 
{

    public static function getController(): Controller
    {
        return new Handler(
            new ShowUsertweetsController(
                new ShowUserTweets(
                    new ShowUserTweetsRepositoryMySQL(new MySQL)
                )
            )
        )
        ;

    }
    

}