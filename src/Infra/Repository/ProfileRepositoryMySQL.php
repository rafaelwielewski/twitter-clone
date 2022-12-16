<?php

namespace App\Infra\Repository;

use App\Domain\Contract\ProfileRepositoryContract;
use App\Domain\Entity\User;
use App\Infra\Database\DB;

class ProfileRepositoryMySQL implements ProfileRepositoryContract {

    public function __construct(private DB $db)
    {}

    public function getProfile(User $profile)
    {

        $sql = 'SELECT * FROM tb_users WHERE deslogin = :username';
        $results = $this->db->findAll($sql, [
            'username' => $profile->getUsername(),
        ]);
        
        return $results;

    }
}
