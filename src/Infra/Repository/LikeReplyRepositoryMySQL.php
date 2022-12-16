<?php

namespace App\Infra\Repository;

use App\Domain\Contract\LikeRepositoryContract;
use App\Domain\Entity\Tweet;
use App\Infra\Database\DB;
use DomainException;

class LikeReplyRepositoryMySQL implements LikeRepositoryContract {

    public function __construct(private DB $db)
    {}

    public function like(Tweet $like)
    {
        $sql = 'SELECT * FROM tb_likesreply WHERE (idreply, iduser) = (:idreply, :iduser)';
        $results = $this->db->findAll($sql, [
            'idreply' => $like->getTweetId(),
            'iduser' => $like->getTweetIduser(),
        ]);


        if (count($results) === 0) {

            $sql = 'INSERT INTO tb_likesreply (idreply, iduser) VALUES (:idreply, :iduser)';
                $this->db->execute($sql, [
                'idreply' => $like->getTweetId(),
                'iduser' => $like->getTweetIduser(),
            ]);

            $sql = 'SELECT COUNT(idlike) AS nrtotal FROM tb_likesreply WHERE idreply = (:idreply)';
            $total = $this->db->findAll($sql, [
                'idreply' => $like->getTweetId(),

            ]);

            $total2 = (int)$total[0]['nrtotal'];


            $sql = "UPDATE tb_replies SET deslikes = :total WHERE idreply = :idreply";
            $this->db->execute($sql, [
                'idreply' => $like->getTweetId(),
                ":total"=>$total2,
            ]);

            return $total2;

        }else {
          
            $sql = 'DELETE FROM tb_replies WHERE (idreply, iduser) = (:idreply, :iduser)';
                $this->db->execute($sql, [
                'idreply' => $like->getTweetId(),
                'iduser' => $like->getTweetIduser(),
            ]);

            $sql = 'SELECT COUNT(idlike) AS nrtotal FROM tb_likesreply WHERE idreply = (:idreply)';
            $total = $this->db->findAll($sql, [
                'idreply' => $like->getTweetId(),

            ]);

            $total2 = (int)$total[0]['nrtotal'];

            $sql = "UPDATE tb_replies SET deslikes = :total WHERE idreply = :idreply";
            $this->db->execute($sql, [
                'idreply' => $like->getTweetId(),
                ":total"=>$total2,
            ]);
            
            return $total2;
            
        }

    }
}
