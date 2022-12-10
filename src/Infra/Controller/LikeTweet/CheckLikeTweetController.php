<?php

namespace App\Infra\Controller\LikeTweet;

use App\Application\UseCase\Like\LikeTweetInput;
use App\Infra\Controller\Controller;
use App\Infra\Controller\HttpRequest;
use App\Infra\Controller\HttpResponse;

class CheckLikeTweetController implements Controller {

    public function __construct(
        private $checkLikeTweetUsecase
    )
    {}

    public function handle(HttpRequest $httpRequest): HttpResponse
    {
        $input = new LikeTweetInput();
        $input->tweetId = $httpRequest->body['idtweet'];
        $input->userid = $httpRequest->body['userid'];

        $output = $this->checkLikeTweetUsecase->execute($input);

        return new HttpResponse(HttpResponse::HTTP_SUCCESS_CODE, $output);
    }

}