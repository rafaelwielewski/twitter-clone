<?php

namespace App\Infra\Factory;

use App\Application\UseCase\Register\Register;
use App\Infra\Controller\Controller;
use App\Infra\Controller\Handler;
use App\Infra\Controller\Register\RegisterController;
use App\Infra\Database\MySQL;
use App\Infra\Factory\Contract\ControllerFactoryContract;
use App\Infra\Repository\RegisterRepositoryMySQL;

/**
 * @codeCoverageIgnore
 */
class RegisterFactory implements ControllerFactoryContract {
    
    public static function getController(): Controller
    {
        return new Handler(
            new RegisterController(
                new Register(
                    new RegisterRepositoryMySQL(new MySQL)
                )
            )
        );
    }

}