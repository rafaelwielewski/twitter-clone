<?php

namespace App\Infra\ThirdParty\Http;

use App\Infra\Factory\Contract\ControllerFactoryContract;

interface Http {

    public function on(string $method, string $path, ControllerFactoryContract $controllerFactory, array $middlewares = []);
    public function run();

}