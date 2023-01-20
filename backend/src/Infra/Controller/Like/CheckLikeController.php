<?php

namespace App\Infra\Controller\Like;

use App\Application\UseCase\Like\LikeInput;
use App\Infra\Controller\Controller;
use App\Infra\Controller\HttpRequest;
use App\Infra\Controller\HttpResponse;

class CheckLikeController implements Controller {

    public function __construct(
        private $checkLikeUsecase
    )
    {}

    public function handle(HttpRequest $httpRequest): HttpResponse
    {
        $input = new LikeInput();
        $input->tweetId = $httpRequest->body['idtweet'];
        $input->userid = $httpRequest->body['userid'];

        $output = $this->checkLikeUsecase->execute($input);

        return new HttpResponse(HttpResponse::HTTP_SUCCESS_CODE, $output);
    }

}