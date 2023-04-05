<?php
namespace App\Domain\Contract;


use App\Domain\Entity\Tweet;

interface LikeRepositoryContract {
    public function like(Tweet $like);
}