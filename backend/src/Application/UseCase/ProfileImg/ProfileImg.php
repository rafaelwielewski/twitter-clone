<?php

namespace App\Application\UseCase\ProfileImg;

use App\Domain\Contract\ProfileImgRepositoryContract;
use App\Domain\Entity\User;

Class ProfileImg {

    public function __construct(private ProfileImgRepositoryContract $ProfileImgRepositoryContract)
    {}


    public function execute(ProfileImgInput $input) 
    {
        $profile = new User();
        $profile->setProfileImg($input->img);
        $profile->setIduser($input->iduser);

        $this->ProfileImgRepositoryContract->setPhoto($profile);

    }

}
?>