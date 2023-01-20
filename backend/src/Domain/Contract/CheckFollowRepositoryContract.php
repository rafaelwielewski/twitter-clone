<?php
namespace App\Domain\Contract;


use App\Domain\Entity\UserFollow;

interface CheckFollowRepositoryContract {
    public function checkfollow(UserFollow $follow);
}