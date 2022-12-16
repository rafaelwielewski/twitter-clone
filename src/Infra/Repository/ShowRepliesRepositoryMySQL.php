<?php

namespace App\Infra\Repository;

use App\Domain\Contract\ShowRepliesRepositoryContract;
use App\Domain\Entity\Tweet;
use App\Infra\Database\DB;

class ShowRepliesRepositoryMySQL implements ShowRepliesRepositoryContract {

    public function __construct(private DB $db)
    {}

    public function ShowReplies(Tweet $idtweet)
    {
        $sql = 'SELECT a.*, b.profileImg, b.desname, b.deslogin FROM `tb_replies` a INNER JOIN  `tb_users` b ON a.iduser = b.iduser WHERE a.idtweet = :idtweet';
        $results = $this->db->findAll($sql, [
            'idtweet' => $idtweet->getTweetId(),
        ]);
        return $results;

    }
}
