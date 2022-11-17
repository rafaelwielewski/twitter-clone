<?php

namespace App\Infra\Controller\ShowAllTweets;

use App\Infra\Controller\Controller;
use App\Infra\Controller\HttpRequest;
use App\Infra\Controller\HttpResponse;

class ShowAllTweetsController implements Controller {

    public function __construct(
        private $ShowAllTweetsUsecase
    )
    {}

    public function handle(HttpRequest $httpRequest): HttpResponse
    {

        $output = $this->ShowAllTweetsUsecase->execute();
        return new HttpResponse(HttpResponse::HTTP_SUCCESS_CODE, $output);
    }

}