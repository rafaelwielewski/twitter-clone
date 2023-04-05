<?php

namespace App\Infra\Factory;

use App\Infra\Controller\Controller;
use App\Infra\Controller\Handler;
use App\Infra\Controller\ProfileImg\GetProfileImgController;
use App\Infra\Factory\Contract\ControllerFactoryContract;
use App\Infra\Repository\GetProfileImgRepository;

/**
 * @codeCoverageIgnore
 */
class GetProfileImgFactory implements ControllerFactoryContract {
    
    public static function getController(): Controller
    {
        return new Handler(
            new GetProfileImgController(
                new GetProfileImgRepository()
            )
        );  
    }
}