<?php

namespace App\Infra\Factory;

use App\Application\UseCase\ProfileImg\ProfileImg;
use App\Infra\Controller\Controller;
use App\Infra\Controller\Handler;
use App\Infra\Controller\ProfileImg\ProfileImgController;
use App\Infra\Factory\Contract\ControllerFactoryContract;
use App\Infra\Repository\ProfileImgRepository;

/**
 * @codeCoverageIgnore
 */
class ProfileImgFactory implements ControllerFactoryContract {
    
    public static function getController(): Controller
    {
        return new Handler(
            new ProfileImgController(
                    //new ProfileImg(
                new ProfileImgRepository()
            )
        );
        //);    
    }
}