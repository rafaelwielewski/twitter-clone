<?php

namespace App\Infra\Controller\ShowOneTweet;

use App\Application\UseCase\ShowOneTweet\ShowOneTweetInput;
use App\Infra\Controller\Controller;
use App\Infra\Controller\HttpRequest;
use App\Infra\Controller\HttpResponse;

class ShowOneTweetController implements Controller {

    public function __construct(
        private $ShowOneTweetUsecase
    )
    {}

    public function handle(HttpRequest $httpRequest): HttpResponse
    {

        $input = new ShowOneTweetInput();
        $input->idtweet = $httpRequest->body['idtweet'];

        $output = $this->ShowOneTweetUsecase->execute($input);
        return new HttpResponse(HttpResponse::HTTP_SUCCESS_CODE, $output);
    }

}