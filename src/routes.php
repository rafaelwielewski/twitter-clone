<?php

use App\Infra\Controller\Home\HomeController;
use App\Infra\Factory\CheckFollowFactory;
use App\Infra\Factory\CheckLikeTweetFactory;
use App\Infra\Factory\CheckLikeReplyFactory;
use App\Infra\Factory\FollowFactory;
use App\Infra\Factory\GetProfileImgFactory;
use App\Infra\Factory\HomeFactory;
use App\Infra\Factory\LikeTweetFactory;
use App\Infra\Factory\LikeReplyFactory;
use App\Infra\Factory\LoginFactory;
use App\Infra\Factory\PostReplyFactory;
use App\Infra\Factory\PostTweetFactory;
use App\Infra\Factory\ProfileFactory;
use App\Infra\Factory\ProfileImgFactory;
use App\Infra\Factory\RegisterFactory;
use App\Infra\Factory\ShowAllTweetsFactory;
use App\Infra\Factory\ShowOneTweetFactory;
use App\Infra\Factory\ShowProfilesFactory;
use App\Infra\Factory\ShowRepliesFactory;
use App\Infra\Factory\ShowThreeProfilesFactory;
use App\Infra\Factory\ShowProfileTweetsFactory;
use App\Infra\Factory\UnfollowFactory;
use App\Infra\ThirdParty\Http\SlimHttpAdapter;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: Content-Type");


$http = new SlimHttpAdapter(AppFactory::create());

$http->on('post', '/get-profileimg', new GetProfileImgFactory, []);
$http->on('post', '/post-profileimg', new ProfileImgFactory, []);
$http->on('post', '/post-tweet', new PostTweetFactory, []);
$http->on('post', '/post-reply', new PostReplyFactory, []);
$http->on('post', '/post-register', new RegisterFactory, []);
$http->on('post', '/post-login', new LoginFactory, []);
$http->on('get', '/get-tweets', new ShowAllTweetsFactory, []);
$http->on('post', '/get-replies', new ShowRepliesFactory, []);
$http->on('post', '/get-profiletweets', new ShowProfileTweetsFactory, []);
$http->on('post', '/get-onetweet', new ShowOneTweetFactory, []);
$http->on('post', '/post-liketweet', new LikeTweetFactory, []);
$http->on('post', '/post-likereply', new LikeReplyFactory, []);
$http->on('post', '/post-checkliketweet', new CheckLikeTweetFactory, []);
$http->on('post', '/post-checklikereply', new CheckLikeReplyFactory, []);
$http->on('post', '/get-profile', new ProfileFactory, []);
$http->on('post', '/post-follow', new FollowFactory, []);
$http->on('post', '/post-unfollow', new UnfollowFactory, []);
$http->on('post', '/post-checkfollow', new CheckFollowFactory, []);
$http->on('post', '/get-showprofiles', new ShowProfilesFactory, []);
$http->on('post', '/get-showthreeprofiles', new ShowThreeProfilesFactory, []);

$http->run();