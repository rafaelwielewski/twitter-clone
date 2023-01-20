<?php

namespace App\Infra\Repository;

use App\Domain\Contract\CheckLikeRepositoryContract;
use App\Domain\Entity\Tweet;
use App\Infra\Database\DB;

class CheckLikeReplyRepositoryMySQL implements CheckLikeRepositoryContract {

    public function __construct(private DB $db)
    {}

    public function checkLike(Tweet $like)
    {

        $sql = 'SELECT * FROM tb_likesreply WHERE (idreply, iduser) = (:idreply, :iduser)';
        $results = $this->db->findAll($sql, [
            'idreply' => $like->getTweetId(),
            'iduser' => $like->getTweetIduser(),
        ]);


        if (count($results) === 0) {

            return 'NotLiked';

        }else {
            
            return 'Liked';
            
        }

    }
}
