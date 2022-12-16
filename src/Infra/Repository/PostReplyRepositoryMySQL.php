<?php

namespace App\Infra\Repository;

use App\Domain\Contract\PostReplyRepositoryContract;
use App\Domain\Entity\Tweet;
use App\Infra\Database\DB;

class PostReplyRepositoryMySQL implements PostReplyRepositoryContract {

    public function __construct(private DB $db)
    {}

    public function save(Tweet $reply)
    {

        $sql = 'INSERT INTO tb_replies (desreply, iduser, idtweet, dtregister) VALUES (:text, :iduser, :idtweet, :date)';
        $this->db->execute($sql, [
            'text' => $reply->getTweetText(),
            'iduser' => $reply->getTweetIduser(),
            'idtweet' => $reply->getTweetId(),
            'date' => $reply->getDate()
        ]);

        $sql = 'SELECT COUNT(desreply) AS nrtotal FROM tb_replies WHERE idtweet = (:idtweet)';
        $result = $this->db->findAll($sql, [
            'idtweet' => $reply->getTweetId(),
        ]);

        $total = (int)$result[0]['nrtotal'];
        var_dump($total);
        $sql = "UPDATE tb_tweets SET desreplies = :total WHERE idtweet = :tweetId";
            $this->db->execute($sql, [
                'tweetId' => $reply->getTweetId(),
                ":total"=>$total,
            ]);

            return $total;
        
    }
}
