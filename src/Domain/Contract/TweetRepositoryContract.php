<?php
namespace App\Domain\Contract;

use App\Domain\Entity\Tweet;

interface TweetRepositoryContract {
    public function save(Tweet $tweet);
}