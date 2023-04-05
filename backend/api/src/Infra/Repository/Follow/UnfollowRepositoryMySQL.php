<?php

namespace App\Infra\Repository\Follow;

use App\Domain\Contract\UnfollowRepositoryContract;
use App\Domain\Entity\UserFollow;
use App\Infra\Database\DB;

class UnfollowRepositoryMySQL implements UnfollowRepositoryContract {

    public function __construct(private DB $db)
    {}

    public function unfollow(UserFollow $follow)
    {

        $sql = 'DELETE FROM tb_followers WHERE (iduserfollower, iduserfollowing) = (:iduserCurrent, :iduserFollow)';
                $this->db->execute($sql, [
                'iduserCurrent' => $follow->getIduserCurrent(),
                'iduserFollow' => $follow->getIduserFollow(),
    ]);

        return "Unfollowed";

    }
}
