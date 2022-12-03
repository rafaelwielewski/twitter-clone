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
            'iduser' => "1"//colocar da session
        ]);

        if (count($results) === 0) {
            $sql = 'INSERT INTO tb_likes (idtweet, iduser) VALUES (:tweetId, :iduser)';
                $this->db->execute($sql, [
                'tweetId' => $like->getTweetId(),
                'iduser' => "1"//colocar da session
            ]);
            /*$results2 = $sql->select("SELECT SQL_CALC_FOUND_ROWS * FROM tb_likes WHERE (idtweet) = (:idtweet)", [
                ':idtweet'=>$idtweet,
            ]);
    
            $result2Total = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");
    
            $total = (int)$result2Total[0]["nrtotal"];
    
            $resultlikes = $sql->select("UPDATE tb_tweets
            SET 
                deslikes = :total
            WHERE idtweet = :idtweet;", array(
                ":idtweet"=>$idtweet,
                ":total"=>$total
            ));*/
            
        }else {
            $sql = 'DELETE FROM tb_likes WHERE (idtweet, iduser) = (:tweetId, :iduser)';
                $this->db->execute($sql, [
                'tweetId' => $like->getTweetId(),
                'iduser' => "1"//colocar da session
            ]);
        }

    }
}
