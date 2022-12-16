<?php

namespace App\Application\UseCase\Profile;

use App\Application\UseCase\Profile\ProfileInput;
use App\Domain\Contract\ProfileRepositoryContract;
use App\Domain\Entity\User;
use App\Domain\Entity\ValueObject\Username;

class Profile {
     
    public function __construct(private ProfileRepositoryContract $profileRepositoryContract)
    {}

    public function execute(ProfileInput $input) 
    {
        $profile = new User();;
        $profile->setUsername(new Username($input->username));

        $output = $this->profileRepositoryContract->getProfile($profile);
        return $output;


    }

}