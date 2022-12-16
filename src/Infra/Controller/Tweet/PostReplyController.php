<?php

namespace App\Infra\Controller\Tweet;

use App\Application\UseCase\PostReply\PostReplyInput;
use App\Infra\Controller\Controller;
use App\Infra\Controller\HttpRequest;
use App\Infra\Controller\HttpResponse;

class PostReplyController implements Controller {

    public function __construct(
        private $PostReplyUsecase
    )
    {}

    public function handle(HttpRequest $httpRequest): HttpResponse
    {

        $input = new PostReplyInput();
        $input->text = $httpRequest->body['text'];
        $input->iduser = $httpRequest->body['iduser'];
        $input->idtweet = $httpRequest->body['idtweet'];

        $output = $this->PostReplyUsecase->execute($input);
        return new HttpResponse(HttpResponse::HTTP_SUCCESS_CODE, $output);
    }

}