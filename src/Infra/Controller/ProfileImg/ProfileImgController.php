<?php

namespace App\Infra\Controller\ProfileImg;

use App\Infra\Controller\Controller;
use App\Infra\Controller\HttpRequest;
use App\Infra\Controller\HttpResponse;

class ProfileImgController implements Controller {

    public function __construct(
        private $ProfileImgUsecase
    )
    {}

    public function handle(HttpRequest $httpRequest): HttpResponse
    {
        $input = $_POST;
        var_dump($input);
        $output = $this->ProfileImgUsecase->setPhoto();
        return new HttpResponse(HttpResponse::HTTP_SUCCESS_CODE, $output);
    }

}