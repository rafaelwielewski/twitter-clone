<?php

namespace App\Infra\Factory;

use App\Application\UseCase\PostTweet\PostTweet;
use App\Infra\Controller\Controller;
use App\Infra\Controller\Handler;
use App\Infra\Controller\Tweet\PostTweetController;
use App\Infra\Database\MySQL;
use App\Infra\Factory\Contract\ControllerFactoryContract;
use App\Infra\Repository\TweetRepositoryMemory;
use App\Infra\Repository\TweetRepositoryMySQL;

/**
 * @codeCoverageIgnore
 */
class PostTweetFactory implements ControllerFactoryContract {
    
    public static function getController(): Controller
    {
        return new Handler(
            new PostTweetController(
                new PostTweet(
                    new TweetRepositoryMySQL(new MySQL)
                )
            )
        );
    }

}