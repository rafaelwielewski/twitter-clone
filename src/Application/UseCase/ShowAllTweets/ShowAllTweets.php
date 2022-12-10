<?php

namespace App\Application\UseCase\ShowAllTweets;

use App\Domain\Contract\ShowAllTweetsRepositoryContract;

class ShowAllTweets {

    public function __construct(private ShowAllTweetsRepositoryContract $ShowAllTweetsRepositoryContract)
    {}

    public function execute() 
    {
        
        return $this->ShowAllTweetsRepositoryContract->showAllTweets();

    }

}
