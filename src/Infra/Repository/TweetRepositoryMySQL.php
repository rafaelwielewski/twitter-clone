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
        var_dump($_SESSION);
        $sql = 'INSERT INTO tb_tweets (destweet, iduser, desname, deslogin, dtregister) VALUES (:text, :iduser, :name, :username, :date)';
        $this->db->execute($sql, [
            'text' => $tweet->getText(),
            'iduser' => $_SESSION['iduser'],
            'name' => $_SESSION['name'],
            'username' => $_SESSION['username'],
            'date' => $tweet->getDate()
        ]);
    }
}
