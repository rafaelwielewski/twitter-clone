<?php

namespace App\Infra\Controller\Tweet;

use App\Application\UseCase\PostTweet\PostTweetInput;
use App\Infra\Controller\Controller;
use App\Infra\Controller\HttpRequest;
use App\Infra\Controller\HttpResponse;

class PostTweetController implements Controller {

    public function __construct(
        private $postTweetUsecase
    )
    {}

    public function handle(HttpRequest $httpRequest): HttpResponse
    {
        

        $input = new PostTweetInput();

        $input->img = $_FILES;
        $input->text = $_POST['text'];
        $input->iduser = $_POST['iduser'];
        $input->name = $_POST['name'];
        $input->username = $_POST['username'];

        $output = $this->postTweetUsecase->execute($input);
        return new HttpResponse(HttpResponse::HTTP_SUCCESS_CODE, $output);
    }

}