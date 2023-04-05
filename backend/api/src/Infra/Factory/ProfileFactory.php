<?php

namespace App\Infra\Factory;

use App\Application\UseCase\Profile\Profile;
use App\Infra\Controller\Controller;
use App\Infra\Controller\Handler;
use App\Infra\Controller\Profile\ProfileController;
use App\Infra\Database\MySQL;
use App\Infra\Factory\Contract\ControllerFactoryContract;
use App\Infra\Repository\Profile\ProfileRepositoryMySQL;

class ProfileFactory implements ControllerFactoryContract {
    
    public static function getController(): Controller
    {
        return new Handler(
            new ProfileController(
                new Profile(
                    new ProfileRepositoryMySQL(new MySQL)
                )
            )
        );
    }

}