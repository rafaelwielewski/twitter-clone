<?php

namespace App\Application\UseCase\ShowUserTweets;

use App\Domain\Contract\ShowUserTweetsRepositoryContract;

class ShowUserTweets {

    public function __construct(private ShowUserTweetsRepositoryContract $ShowUserTweetsRepositoryContract)
    {}

    public function execute() 
    {
        
        $this->ShowUserTweetsRepositoryContract->ShowUserTweets();
    }

}
