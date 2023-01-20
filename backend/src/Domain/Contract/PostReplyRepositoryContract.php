<?php
namespace App\Domain\Contract;

use App\Domain\Entity\Tweet;

interface PostReplyRepositoryContract {
    public function save(Tweet $reply);
}