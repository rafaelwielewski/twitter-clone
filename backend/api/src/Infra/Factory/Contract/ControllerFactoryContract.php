<?php

namespace App\Infra\Factory\Contract;

use App\Infra\Controller\Controller;

interface ControllerFactoryContract {
    public static function getController(): Controller;
}