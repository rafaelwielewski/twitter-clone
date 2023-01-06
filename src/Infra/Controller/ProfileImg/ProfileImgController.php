<?php

namespace App\Infra\Controller\ProfileImg;

use App\Application\UseCase\ProfileImg\ProfileImgInput;
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
        $input = new ProfileImgInput();

        $input->img = $_FILES['file'];
        $input->iduser = $_POST['iduser'];

        $output = $this->ProfileImgUsecase->execute($input);
        return new HttpResponse(HttpResponse::HTTP_SUCCESS_CODE, $output);
    }

}