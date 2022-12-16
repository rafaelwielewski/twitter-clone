<?php

use App\Infra\Controller\Home\HomeController;
use App\Infra\Factory\CheckLikeTweetFactory;
use App\Infra\Factory\GetProfileImgFactory;
use App\Infra\Factory\HomeFactory;
use App\Infra\Factory\LikeTweetFactory;
use App\Infra\Factory\LoginFactory;
use App\Infra\Factory\PostReplyFactory;
use App\Infra\Factory\PostTweetFactory;
use App\Infra\Factory\ProfileImgFactory;
use App\Infra\Factory\RegisterFactory;
use App\Infra\Factory\ShowAllTweetsFactory;
use App\Infra\Factory\ShowOneTweetFactory;
use App\Infra\Factory\ShowRepliesFactory;
use App\Infra\Factory\ShowUserTweetsFactory;
use App\Infra\ThirdParty\Http\SlimHttpAdapter;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: Content-Type");

// $app = AppFactory::create();

// //$app->post('/', LoginController::class . ':handle');
// $app->post('/post-profileimg', ProfileImgRepository::class . ':saveImg');
// $app->run();

$http = new SlimHttpAdapter(AppFactory::create());

$http->on('post', '/get-profileimg', new GetProfileImgFactory, []);
$http->on('post', '/post-profileimg', new ProfileImgFactory, []);
$http->on('post', '/post-tweet', new PostTweetFactory, []);
$http->on('post', '/post-reply', new PostReplyFactory, []);
$http->on('post', '/post-register', new RegisterFactory, []);
$http->on('post', '/post-login', new LoginFactory, []);
$http->on('get', '/get-tweets', new ShowAllTweetsFactory, []);
$http->on('post', '/get-replies', new ShowRepliesFactory, []);
$http->on('get', '/get-usertweets', new ShowUserTweetsFactory, []);
$http->on('post', '/get-onetweet', new ShowOneTweetFactory, []);
$http->on('post', '/post-liketweet', new LikeTweetFactory, []);
$http->on('post', '/post-checkliketweet', new CheckLikeTweetFactory, []);

$http->run();