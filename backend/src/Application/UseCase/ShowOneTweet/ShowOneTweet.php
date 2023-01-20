<?php

namespace App\Application\UseCase\ShowOneTweet;

use App\Domain\Contract\ShowOneTweetRepositoryContract;
use App\Domain\Entity\Tweet;

class ShowOneTweet {

    public function __construct(private ShowOneTweetRepositoryContract $ShowOneTweetRepositoryContract)
    {}

    public function execute(ShowOneTweetInput $input) 
    {
        $idtweet = new Tweet();
        $idtweet->setTweetId($input->idtweet);
        return $this->ShowOneTweetRepositoryContract->ShowOneTweet($idtweet);
    }

}
