<?php

namespace App\Infra\Controller\Tweet;

use App\Application\UseCase\PostTweet\PostTweetInput;
use App\Infra\Controller\Controller;
use App\Infra\Controller\HttpRequest;
use App\Infra\Controller\HttpResponse;

class PostTweetController implements Controller {

    public function __construct(
        private $postTweetUsecase
    )
    {}

    public function handle(HttpRequest $httpRequest): HttpResponse
    {

        $input = new PostTweetInput();
        $input->text = $httpRequest->body['text'];
        $input->iduser = $httpRequest->body['iduser'];
        $input->name = $httpRequest->body['name'];
        $input->username = $httpRequest->body['username'];

        $output = $this->postTweetUsecase->execute($input);
        return new HttpResponse(HttpResponse::HTTP_SUCCESS_CODE, $output);
    }

}