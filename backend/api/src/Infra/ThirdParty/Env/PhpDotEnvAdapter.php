<?php

namespace App\Infra\ThirdParty\Env;

use Dotenv\Dotenv;

/**
 * @codeCoverageIgnore
 */
class PhpDotEnvAdapter {

    public static function load($dir) 
    {
        $dotenv = Dotenv::createImmutable($dir);
        $dotenv->load();
    }

}
