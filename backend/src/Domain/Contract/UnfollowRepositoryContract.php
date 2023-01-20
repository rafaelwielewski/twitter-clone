<?php
namespace App\Domain\Contract;


use App\Domain\Entity\UserFollow;

interface UnfollowRepositoryContract {
    public function unfollow(UserFollow $follow);
}