<?php

namespace App\Infra\Repository;

use App\Domain\Contract\CheckLikeRepositoryContract;
use App\Domain\Entity\Tweet;
use App\Infra\Database\DB;

class CheckLikeTweetRepositoryMySQL implements CheckLikeRepositoryContract {

    public function __construct(private DB $db)
    {}

    public function checkLike(Tweet $like)
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
