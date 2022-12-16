<?php
namespace App\Domain\Contract;

use App\Domain\Entity\Tweet;

interface ShowRepliesRepositoryContract {
    public function ShowReplies(Tweet $idtweet);
}