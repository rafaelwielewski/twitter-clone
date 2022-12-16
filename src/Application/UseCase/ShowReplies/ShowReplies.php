<?php

namespace App\Application\UseCase\ShowReplies;

use App\Domain\Contract\ShowRepliesRepositoryContract;
use App\Domain\Entity\Tweet;

class ShowReplies {

    public function __construct(private ShowRepliesRepositoryContract $showRepliesRepositoryContract)
    {}

    public function execute(ShowRepliesInput $input) 
    {
        $idtweet = new Tweet();
        $idtweet->setTweetId($input->idtweet);
        return $this->showRepliesRepositoryContract->ShowReplies($idtweet);
    }

}
