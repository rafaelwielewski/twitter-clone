<?php
namespace App\Domain\Contract;

use App\Domain\Entity\User;

interface ProfileImgRepositoryContract {
    public function setPhoto(User $profile);

}