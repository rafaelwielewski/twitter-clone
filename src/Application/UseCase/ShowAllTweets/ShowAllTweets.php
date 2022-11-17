<?php

namespace App\Application\UseCase\ShowAllTweets;

use App\Domain\Contract\ShowAllTweetsRepositoryContract;

class ShowAllTweets {

    public function __construct(private ShowAllTweetsRepositoryContract $ShowAllTweetsRepositoryContract)
    {}

    public function execute() 
    {
        
        $this->ShowAllTweetsRepositoryContract->showAllTweets();
    }

}
