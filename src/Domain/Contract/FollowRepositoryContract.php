<?php
namespace App\Domain\Contract;


use App\Domain\Entity\UserFollow;

interface FollowRepositoryContract {
    public function follow(UserFollow $follow);
}