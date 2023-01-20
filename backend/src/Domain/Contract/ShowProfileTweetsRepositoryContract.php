<?php
namespace App\Domain\Contract;

use App\Domain\Entity\User;

interface ShowProfileTweetsRepositoryContract {
    public function ShowProfileTweets(User $profile);
}