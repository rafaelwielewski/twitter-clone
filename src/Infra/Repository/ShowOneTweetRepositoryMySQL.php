<?php

namespace App\Infra\Repository;

use App\Domain\Contract\ShowOneTweetRepositoryContract;
use App\Domain\Entity\Tweet;
use App\Infra\Database\DB;

class ShowOneTweetRepositoryMySQL implements ShowOneTweetRepositoryContract {

    public function __construct(private DB $db)
    {}

    public function ShowOneTweet(Tweet $idtweet)
    {
        $sql = 'SELECT a.*, b.profileImg FROM `tb_tweets` a INNER JOIN  `tb_users` b ON a.iduser = b.iduser WHERE a.idtweet = :idtweet';
        $results = $this->db->findAll($sql, [
            'idtweet' => $idtweet->getTweetId(),
        ]);
        return $results;

    }
}
