<?php

namespace App\Infra\Factory;

use App\Application\UseCase\Login\Login;
use App\Infra\Controller\Controller;
use App\Infra\Controller\Handler;
use App\Infra\Controller\Login\LoginController;
use App\Infra\Database\MySQL;
use App\Infra\Factory\Contract\ControllerFactoryContract;
use App\Infra\Repository\LoginRepositoryMySQL;

/**
 * @codeCoverageIgnore
 */
class LoginFactory implements ControllerFactoryContract {
    
    public static function getController(): Controller
    {
        return new Handler(
            new LoginController(
                new Login(
                    new LoginRepositoryMySQL(new MySQL)
                )
            )
        );
    }

}