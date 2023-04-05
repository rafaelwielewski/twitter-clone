<?php

namespace App\Infra\Repository;

use App\Domain\Contract\TweetRepositoryContract;
use App\Domain\Entity\Tweet;

class TweetRepositoryMemory implements TweetRepositoryContract {
    public function save(Tweet $tweet)
    {
        // salvar no banco
    }
}
