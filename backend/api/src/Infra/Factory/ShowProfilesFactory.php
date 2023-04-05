<?php

namespace App\Infra\Factory;

use App\Application\UseCase\Profile\ShowProfiles;
use App\Infra\Controller\Controller;
use App\Infra\Controller\Handler;
use App\Infra\Controller\Profile\ShowProfilesController;
use App\Infra\Database\MySQL;
use App\Infra\Factory\Contract\ControllerFactoryContract;
use App\Infra\Repository\Profile\ShowProfilesRepositoryMySQL;

class ShowProfilesFactory implements ControllerFactoryContract {
    
    public static function getController(): Controller
    {
        return new Handler(
            new ShowProfilesController(
                new ShowProfiles(
                    new ShowProfilesRepositoryMySQL(new MySQL)
                )
            )
        );
    }

}