<?php

use App\Infra\Factory\LoginFactory;
use App\Infra\Factory\PostTweetFactory;
use App\Infra\Factory\RegisterFactory;
use App\Infra\Factory\ShowAllTweetsFactory;
use App\Infra\ThirdParty\Http\SlimHttpAdapter;
use Slim\Factory\AppFactory;

$http = new SlimHttpAdapter(AppFactory::create());

$http->on('post', '/post-tweet', new PostTweetFactory, []);
$http->on('post', '/post-register', new RegisterFactory, []);
$http->on('post', '/post-login', new LoginFactory, []);
$http->on('get', '/get-tweets', new ShowAllTweetsFactory, []);

$http->run();