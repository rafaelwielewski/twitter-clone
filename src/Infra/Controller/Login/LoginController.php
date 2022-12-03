<?php

namespace App\Infra\Controller\Login;

use App\Application\UseCase\Login\LoginInput;
use App\Infra\Controller\Controller;
use App\Infra\Controller\HttpRequest;
use App\Infra\Controller\HttpResponse;

class LoginController implements Controller {

    public function __construct(
        private $loginUsecase
    )
    {}

    public function handle(HttpRequest $httpRequest): HttpResponse
    {

        $input = new LoginInput();
        $post = json_decode(file_get_contents('php://input'), true);

        $input->usernameLogin = $post['username'];
        $input->passwordLogin = $post['password'];

        $output = $this->loginUsecase->execute($input);
        return new HttpResponse(HttpResponse::HTTP_SUCCESS_CODE, $output);
    }

}