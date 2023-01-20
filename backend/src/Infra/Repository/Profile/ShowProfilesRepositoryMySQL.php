<?php

namespace App\Infra\Repository\Profile;

use App\Domain\Contract\ShowProfilesRepositoryContract;
use App\Domain\Entity\User;
use App\Infra\Database\DB;

class ShowProfilesRepositoryMySQL implements ShowProfilesRepositoryContract {

    public function __construct(private DB $db)
    {}

    public function showProfiles(User $profile)
    {

        $sql = 'SELECT iduser, desname, deslogin, profileImg, bio FROM tb_users';
        $results = $this->db->findAll($sql, [
        ]);
        
        return $results;

    }
}
