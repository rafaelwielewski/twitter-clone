<?php

namespace App\Infra\Controller\ShowUsertweets;

use App\Infra\Controller\Controller;
use App\Infra\Controller\HttpRequest;
use App\Infra\Controller\HttpResponse;

class ShowUsertweetsController implements Controller {

    public function __construct(
        private $ShowUsertweetsUsecase
    )
    {}

    public function handle(HttpRequest $httpRequest): HttpResponse
    {

        $output = $this->ShowUsertweetsUsecase->execute();
        return new HttpResponse(HttpResponse::HTTP_SUCCESS_CODE, $output);
    }

}