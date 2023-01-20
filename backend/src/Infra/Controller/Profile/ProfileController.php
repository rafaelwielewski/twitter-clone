<?php

namespace App\Infra\Controller\Profile;

use App\Application\UseCase\Profile\ProfileInput;
use App\Infra\Controller\Controller;
use App\Infra\Controller\HttpRequest;
use App\Infra\Controller\HttpResponse;

class ProfileController implements Controller {

    public function __construct(
        private $profileUsecase
    )
    {}

    public function handle(HttpRequest $httpRequest): HttpResponse
    {

        $input = new ProfileInput();
        $input->username = $httpRequest->body['username'];
        
        $output = $this->profileUsecase->execute($input);

        return new HttpResponse(HttpResponse::HTTP_SUCCESS_CODE, $output);

    }

}