<?php

namespace App\Infra\Controller\ProfileImg;

use App\Infra\Controller\Controller;
use App\Infra\Controller\HttpRequest;
use App\Infra\Controller\HttpResponse;

class GetProfileImgController implements Controller {

    public function __construct(
        private $ProfileImgUsecase
    )
    {}

    public function handle(HttpRequest $httpRequest): HttpResponse
    {
        $input = $httpRequest->body['username'];
        $output = $this->ProfileImgUsecase->checkPhoto($input);
        return new HttpResponse(HttpResponse::HTTP_SUCCESS_CODE, $output);
    }

}