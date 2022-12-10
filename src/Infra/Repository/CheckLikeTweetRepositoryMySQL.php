<?php

namespace App\Infra\Repository;

use App\Domain\Contract\CheckLikeTweetRepositoryContract;
use App\Domain\Entity\Tweet;
use App\Infra\Database\DB;

class CheckLikeTweetRepositoryMySQL implements CheckLikeTweetRepositoryContract {

    public function __construct(private DB $db)
    {}

    public function checkLikeTweet(Tweet $like)
    {

        $sql = 'SELECT * FROM tb_likes WHERE (idtweet, iduser) = (:tweetId, :iduser)';
        $results = $this->db->findAll($sql, [
            'tweetId' => $like->getTweetId(),
            'iduser' => $like->getTweetIduser(),
        ]);


        if (count($results) === 0) {

            return 'NotLiked';

        }else {
            
            return 'Liked';
            
        }

    }
}
