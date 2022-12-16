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
    }
}
