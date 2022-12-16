<?php

namespace App\Infra\Controller\ShowReplies;

use App\Application\UseCase\ShowReplies\ShowRepliesInput;
use App\Infra\Controller\Controller;
use App\Infra\Controller\HttpRequest;
use App\Infra\Controller\HttpResponse;

class ShowRepliesController implements Controller {

    public function __construct(
        private $ShowRepliesUsecase
    )
    {}

    public function handle(HttpRequest $httpRequest): HttpResponse
    {

        $input = new ShowRepliesInput();
        $input->idtweet = $httpRequest->body['idtweet'];

        $output = $this->ShowRepliesUsecase->execute($input);
        return new HttpResponse(HttpResponse::HTTP_SUCCESS_CODE, $output);
    }

}