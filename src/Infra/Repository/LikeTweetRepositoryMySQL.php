<?php

namespace App\Infra\Repository;

use App\Domain\Contract\LikeTweetRepositoryContract;
use App\Domain\Entity\Tweet;
use App\Infra\Database\DB;
use DomainException;

class LikeTweetRepositoryMySQL implements LikeTweetRepositoryContract {

    public function __construct(private DB $db)
    {}

    public function likeTweet(Tweet $like)
    {
        $sql = 'SELECT * FROM tb_likes WHERE (idtweet, iduser) = (:tweetId, :iduser)';
        $results = $this->db->findAll($sql, [
            'tweetId' => $like->getTweetId(),
            'iduser' => $like->getTweetIduser(),
        ]);


        if (count($results) === 0) {

            $sql = 'INSERT INTO tb_likes (idtweet, iduser) VALUES (:tweetId, :iduser)';
                $this->db->execute($sql, [
                'tweetId' => $like->getTweetId(),
                'iduser' => $like->getTweetIduser(),
            ]);

            $sql = 'SELECT COUNT(idlike) AS nrtotal FROM tb_likes WHERE idtweet = (:tweetId)';
            $total = $this->db->findAll($sql, [
                'tweetId' => $like->getTweetId(),

            ]);

            $total2 = (int)$total[0]['nrtotal'];


            $sql = "UPDATE tb_tweets SET deslikes = :total WHERE idtweet = :tweetId";
            $this->db->execute($sql, [
                'tweetId' => $like->getTweetId(),
                ":total"=>$total2,
            ]);

            return $total2;

        }else {
          
            $sql = 'DELETE FROM tb_likes WHERE (idtweet, iduser) = (:tweetId, :iduser)';
                $this->db->execute($sql, [
                'tweetId' => $like->getTweetId(),
                'iduser' => $like->getTweetIduser(),
            ]);

            $sql = 'SELECT COUNT(idlike) AS nrtotal FROM tb_likes WHERE idtweet = (:tweetId)';
            $total = $this->db->findAll($sql, [
                'tweetId' => $like->getTweetId(),

            ]);

            $total2 = (int)$total[0]['nrtotal'];

            $sql = "UPDATE tb_tweets SET deslikes = :total WHERE idtweet = :tweetId";
            $this->db->execute($sql, [
                'tweetId' => $like->getTweetId(),
                ":total"=>$total2,
            ]);
            
            return $total2;
            
        }

    }
}
