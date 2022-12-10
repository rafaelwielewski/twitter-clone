<?php

namespace App\Infra\Repository;

use App\Domain\Contract\TweetRepositoryContract;
use App\Domain\Entity\Tweet;
use App\Infra\Database\DB;

class TweetRepositoryMySQL implements TweetRepositoryContract {

    public function __construct(private DB $db)
    {}

    public function save(Tweet $tweet)
    {

        session_start();//tirar
        $sql = 'INSERT INTO tb_tweets (destweet, iduser, desname, deslogin, dtregister) VALUES (:text, :iduser, :name, :username, :date)';
        $this->db->execute($sql, [
            'text' => $tweet->getTweetText(),
            'iduser' => $tweet->getTweetIduser(),
            'name' => $tweet->getTweetName(),
            'username' => $tweet->getTweetUsername(),
            'date' => $tweet->getDate()
        ]);
    }
}
