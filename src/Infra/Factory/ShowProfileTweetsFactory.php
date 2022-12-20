<?php

namespace App\Infra\Factory;

use App\Application\UseCase\Profile\ShowProfileTweets;
use App\Infra\Controller\Controller;
use App\Infra\Controller\Handler;
use App\Infra\Controller\Profile\ShowProfileTweetsController;
use App\Infra\Database\MySQL;
use App\Infra\Factory\Contract\ControllerFactoryContract;
use App\Infra\Repository\Profile\ShowProfileTweetsRepositoryMySQL;

/**
 * @codeCoverageIgnore
 */
class ShowProfileTweetsFactory implements ControllerFactoryContract 
{

    public static function getController(): Controller
    {
        return new Handler(
            new ShowProfileTweetsController(
                new ShowProfileTweets(
                    new ShowProfileTweetsRepositoryMySQL(new MySQL)
                )
            )
        )
        ;

    }
    

}