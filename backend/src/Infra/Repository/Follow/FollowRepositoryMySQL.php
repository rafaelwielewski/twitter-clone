<?php

namespace App\Infra\Repository\Follow;

use App\Domain\Contract\FollowRepositoryContract;
use App\Domain\Entity\UserFollow;
use App\Infra\Database\DB;

class FollowRepositoryMySQL implements FollowRepositoryContract {

    public function __construct(private DB $db)
    {}

    public function follow(UserFollow $follow)
    {

        $sql = 'INSERT INTO tb_followers (iduserfollower, iduserfollowing) VALUES (:iduserCurrent, :iduserFollow)';
                $this->db->execute($sql, [
                'iduserCurrent' => $follow->getIduserCurrent(),
                'iduserFollow' => $follow->getIduserFollow(),
            ]);

    ///////////////////  SAVE FOLLOWERS NUMBER /////////////////////
        $sql = 'SELECT COUNT(idfollow) AS nrtotal FROM tb_followers WHERE iduserfollowing = (:iduserFollow)';
        $total = $this->db->findAll($sql, [
                'iduserFollow' => $follow->getIduserFollow(),

            ]);

        $total2 = (int)$total[0]['nrtotal'];


        $sql = "UPDATE tb_users SET followers = :total WHERE iduser = :iduserFollow";
                $this->db->execute($sql, [
                'iduserFollow' => $follow->getIduserFollow(),
                ":total"=>$total2,
            ]);

    ///////////////////  SAVE FOLLOWING NUMBER /////////////////////

        $sql = 'SELECT COUNT(idfollow) AS nrtotal FROM tb_followers WHERE iduserfollower = (:iduserCurrent)';
        $total3 = $this->db->findAll($sql, [
            'iduserCurrent' => $follow->getIduserCurrent(),

            ]);

        $total4 = (int)$total3[0]['nrtotal'];


        $sql = "UPDATE tb_users SET follows = :total WHERE iduser = :iduserCurrent";
                $this->db->execute($sql, [
                    'iduserCurrent' => $follow->getIduserCurrent(),
                    ":total"=>$total4,
            ]);

        return "Followed";

    }
}
