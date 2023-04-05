<?php

namespace App\Infra\Repository\Follow;

use App\Domain\Contract\CheckFollowRepositoryContract;
use App\Domain\Entity\UserFollow;
use App\Infra\Database\DB;

class CheckFollowRepositoryMySQL implements CheckFollowRepositoryContract
{

    public function __construct(private DB $db)
    {
    }

    public function checkfollow(UserFollow $follow)
    {

        $sql = 'SELECT * FROM tb_followers WHERE (iduserfollower, iduserfollowing) = (:iduserCurrent, :iduserFollow)';
        $results = $this->db->findAll($sql, [
            'iduserCurrent' => $follow->getIduserCurrent(),
            'iduserFollow' => $follow->getIduserFollow(),
        ]);


        if (count($results) === 0) {

            return "Not Following";

        }else {

            return "Following";

        }

    }
}
