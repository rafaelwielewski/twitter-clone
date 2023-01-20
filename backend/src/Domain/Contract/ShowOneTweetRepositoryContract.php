<?php
namespace App\Domain\Contract;

use App\Domain\Entity\Tweet;

interface ShowOneTweetRepositoryContract {
    public function ShowOneTweet(Tweet $idtweet);
}