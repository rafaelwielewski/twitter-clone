<?php

namespace App\Infra\Controller\Follow;

use App\Application\UseCase\Follow\FollowInput;
use App\Infra\Controller\Controller;
use App\Infra\Controller\HttpRequest;
use App\Infra\Controller\HttpResponse;

class FollowController implements Controller {

    public function __construct(
        private $followUsecase
    )
    {}

    public function handle(HttpRequest $httpRequest): HttpResponse
    {
        $input = new FollowInput();
        $input->iduserCurrent = $httpRequest->body['iduserCurrent'];
        $input->iduserFollow = $httpRequest->body['iduserFollow'];
        $output = $this->followUsecase->execute($input);

        return new HttpResponse(HttpResponse::HTTP_SUCCESS_CODE, $output);

    }

}