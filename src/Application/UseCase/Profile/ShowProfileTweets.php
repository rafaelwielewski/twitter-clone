<?php

namespace App\Application\UseCase\Profile;

use App\Domain\Contract\ShowProfileTweetsRepositoryContract;
use App\Domain\Entity\User;
use App\Domain\Entity\ValueObject\Username;

class ShowProfileTweets {

    public function __construct(private ShowProfileTweetsRepositoryContract $ShowProfileTweetsRepositoryContract)
    {}

    public function execute(ProfileInput $input) 
    {
        $profile = new User();;
        $profile->setUsername(new Username($input->username));

        $output = $this->ShowProfileTweetsRepositoryContract->ShowProfileTweets($profile);
        return $output;

    }

}
