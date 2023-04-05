<?php
namespace App\Domain\Contract;


use App\Domain\Entity\Tweet;

interface CheckLikeRepositoryContract {
    public function checkLike(Tweet $like);
}