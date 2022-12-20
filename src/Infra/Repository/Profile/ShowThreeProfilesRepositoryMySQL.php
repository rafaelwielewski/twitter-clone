<?php

namespace App\Infra\Repository\Profile;

use App\Domain\Contract\ShowProfilesRepositoryContract;
use App\Domain\Entity\User;
use App\Infra\Database\DB;

class ShowThreeProfilesRepositoryMySQL implements ShowProfilesRepositoryContract {

    public function __construct(private DB $db)
    {}

    public function showProfiles(User $profile)
    {

        $sql = 'SELECT iduser, desname, deslogin, profileImg FROM tb_users ORDER BY dtregister LIMIT 0, 3;';
        $results = $this->db->findAll($sql, [
        ]);
        
        return $results;

    }
}
