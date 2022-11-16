<?php

namespace App\Infra\Controller\Register;

use App\Application\UseCase\Register\RegisterInput;
use App\Infra\Controller\Controller;
use App\Infra\Controller\HttpRequest;
use App\Infra\Controller\HttpResponse;

class RegisterController implements Controller {

    public function __construct(
        private $registerUsecase
    )
    {}

    public function handle(HttpRequest $httpRequest): HttpResponse
    {
        $input = new RegisterInput();
        $input->nameRegister = $httpRequest->body['name'];
        $input->usernameRegister = $httpRequest->body['username'];
        $input->passwordRegister = $httpRequest->body['password'];

        $output = $this->registerUsecase->execute($input);
        return new HttpResponse(HttpResponse::HTTP_SUCCESS_CODE, $output);
    }

}