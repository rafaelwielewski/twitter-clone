<?php

namespace App\Infra\Repository;

use App\Domain\Contract\ShowAllTweetsRepositoryContract;
use App\Infra\Database\DB;

class ShowAllTweetsRepositoryMySQL implements ShowAllTweetsRepositoryContract {

    public function __construct(private DB $db)
    {}

    public function showAllTweets()
    {
        $sql = 'SELECT * FROM tb_tweets';
        $results = $this->db->findAll($sql, []);
        var_dump($results);

        /*$ShowAllTweets['name'] = $results["desname"];
        $ShowAllTweets['username'] = $results["deslogin"];
        $ShowAllTweets['tweet'] = $results["destweet"];
        $ShowAllTweets['date'] = $results["dtresgister"];
        $ShowAllTweets['replies'] = $results["desreplies"];
        $ShowAllTweets['likes'] = $results["deslikes"];
        $ShowAllTweets['idtweet'] = $results["idtweet"];*/
        
        return $this->ShowAllTweets = $results;
    }
}
