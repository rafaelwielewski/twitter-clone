<?php


require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use App\Infra\ThirdParty\Env\PhpDotEnvAdapter;
PhpDotEnvAdapter::load(__DIR__ . '/..');

require __DIR__ . DIRECTORY_SEPARATOR . 'routes.php';

