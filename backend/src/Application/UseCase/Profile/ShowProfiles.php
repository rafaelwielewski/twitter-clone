<?php

namespace App\Application\UseCase\Profile;

use App\Application\UseCase\Profile\ProfileInput;
use App\Domain\Contract\ShowProfilesRepositoryContract;
use App\Domain\Entity\User;
use App\Domain\Entity\ValueObject\Username;

class ShowProfiles {
     
    public function __construct(private ShowProfilesRepositoryContract $showProfilesRepositoryContract)
    {}

    public function execute(ProfileInput $input) 
    {
        $profile = new User();;
        $profile->setUsername(new Username($input->username));

        $output = $this->showProfilesRepositoryContract->showProfiles($profile);
        return $output;


    }

}