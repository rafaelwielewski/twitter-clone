<?php

namespace App\Infra\Factory;

use App\Infra\Controller\Controller;
use App\Infra\Controller\Handler;
use App\Infra\Controller\LikeTweet\HomeController;

use App\Infra\Database\MySQL;
use App\Infra\Factory\Contract\ControllerFactoryContract;
use App\Infra\Repository\LikeTweetRepositoryMySQL;

/**
 * @codeCoverageIgnore
 */
class HomeFactory implements ControllerFactoryContract {
    
    public static function getController(): Controller
    {
        return new Handler(
            new HomeController()
        );    
    }
}