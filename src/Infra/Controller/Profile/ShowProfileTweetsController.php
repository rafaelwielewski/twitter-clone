<?php

namespace App\Infra\Controller\Profile;

use App\Application\UseCase\Profile\ProfileInput;
use App\Infra\Controller\Controller;
use App\Infra\Controller\HttpRequest;
use App\Infra\Controller\HttpResponse;

class ShowProfileTweetsController implements Controller {

    public function __construct(
        private $ShowProfileTweetsUsecase
    )
    {}

    public function handle(HttpRequest $httpRequest): HttpResponse
    {
        $input = new ProfileInput();
        $input->username = $httpRequest->body['username'];
        
        $output = $this->ShowProfileTweetsUsecase->execute($input);
        return new HttpResponse(HttpResponse::HTTP_SUCCESS_CODE, $output);
    }

}