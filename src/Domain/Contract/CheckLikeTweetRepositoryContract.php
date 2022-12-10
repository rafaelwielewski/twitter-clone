<?php
namespace App\Domain\Contract;


use App\Domain\Entity\Tweet;

interface CheckLikeTweetRepositoryContract {
    public function checkLikeTweet(Tweet $like);
}