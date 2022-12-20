<?php

namespace App\Infra\Repository\Profile;

use App\Domain\Contract\ShowProfileTweetsRepositoryContract;
use App\Domain\Entity\User;
use App\Infra\Database\DB;

class ShowProfileTweetsRepositoryMySQL implements ShowProfileTweetsRepositoryContract {

    public function __construct(private DB $db)
    {}

    public function ShowProfileTweets(User $profile)
    {
        $sql = 'SELECT a.*, b.profileImg FROM `tb_tweets` a INNER JOIN  `tb_users` b ON a.iduser = b.iduser WHERE a.deslogin = :username';

        $results = $this->db->findAll($sql, [
            'username' => $profile->getUsername(),
        ]);
        
        return $results;
    }
}
