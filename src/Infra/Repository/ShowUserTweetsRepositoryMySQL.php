<?php

namespace App\Infra\Repository;

use App\Domain\Contract\ShowUserTweetsRepositoryContract;
use App\Infra\Database\DB;

class ShowUserTweetsRepositoryMySQL implements ShowUserTweetsRepositoryContract {

    public function __construct(private DB $db)
    {}

    public function ShowUserTweets()
    {
        session_start();//tirar
        $sql = 'SELECT * FROM tb_tweets WHERE deslogin = :username';
        $results = $this->db->findAll($sql, [
            'username' => $_SESSION['username'],
        ]);
        
          
        return $this->ShowUserTweets = $results;
    }
}
