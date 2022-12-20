<?php
namespace App\Domain\Contract;


use App\Domain\Entity\User;

interface ShowProfilesRepositoryContract {
    public function showProfiles(User $profile);
}