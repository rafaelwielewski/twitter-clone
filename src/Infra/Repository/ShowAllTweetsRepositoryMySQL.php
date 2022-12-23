<?php

namespace App\Infra\Repository;

use App\Domain\Contract\ShowAllTweetsRepositoryContract;
use App\Infra\Database\DB;

class ShowAllTweetsRepositoryMySQL implements ShowAllTweetsRepositoryContract {

    public function __construct(private DB $db)
    {}

    public function showAllTweets()
    {
        $sql = 'SELECT a.*, b.profileImg FROM `tb_tweets` a INNER JOIN  `tb_users` b ON a.iduser = b.iduser';
        $results = $this->db->findAll($sql, []);

        return $results;

    }
}
