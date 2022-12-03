<?php
namespace App\Domain\Contract;


use App\Domain\Entity\Tweet;

interface LikeTweetRepositoryContract {
    public function likeTweet(Tweet $like);
}