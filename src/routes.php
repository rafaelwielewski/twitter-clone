<?php

use App\Infra\Controller\Home\HomeController;
use App\Infra\Factory\HomeFactory;
use App\Infra\Factory\LikeTweetFactory;
use App\Infra\Factory\LoginFactory;
use App\Infra\Factory\PostTweetFactory;
use App\Infra\Factory\RegisterFactory;
use App\Infra\Factory\ShowAllTweetsFactory;
use App\Infra\Factory\ShowUserTweetsFactory;
use App\Infra\ThirdParty\Http\SlimHttpAdapter;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: Content-Type");

$app = AppFactory::create();

/*$app->get('/hello/{name}', function ($request, $response, $args) {
    $renderer = new PhpRenderer('path/to/templates');
    return $renderer->render($response, "hello.php", $args);
});*/

//$app->post('/', HomeController::class . ':login');

//$app->run();

$http = new SlimHttpAdapter(AppFactory::create());

$http->on('post', '/post-tweet', new PostTweetFactory, []);
$http->on('post', '/post-register', new RegisterFactory, []);
$http->on('post', '/post-login', new LoginFactory, []);
$http->on('get', '/get-tweets', new ShowAllTweetsFactory, []);
$http->on('get', '/get-usertweets', new ShowUserTweetsFactory, []);
$http->on('post', '/post-like', new LikeTweetFactory, []);

$http->run();