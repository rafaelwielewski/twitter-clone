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

        $sql = 'INSERT INTO tb_tweets (destweet, iduser, desname, deslogin, dtregister) VALUES (:text, :iduser, :name, :username, :date)
                ';
                $this->db->execute($sql, [
                'text' => $tweet->getTweetText(),
                'iduser' => $tweet->getTweetIduser(),
                'name' => $tweet->getTweetName(),
                'username' => $tweet->getTweetUsername(),
                'date' => $tweet->getDate()
        ]);

        $lastInsertedId = $this->db->getLastInsertedId();


        if (count($tweet->getTweetImg()) > 0) {


            $img = $tweet->getTweetImg();

            
            $extension = explode('.', $img["file"]['name']);
            $extension = end($extension);

            if ($extension === 'jpg') {

                $image = imagecreatefromjpeg($img["file"]["tmp_name"]);
                $extensionfinal = ".jpg";

            } elseif ($extension === 'jpeg') {

                $image = imagecreatefromjpeg($img["file"]["tmp_name"]);
                $extensionfinal = ".jpg";

            } elseif ($extension === 'png') {

                $image = imagecreatefrompng($img["file"]["tmp_name"]);
                $extensionfinal = ".jpg";

            } elseif ($extension === 'gif') {
                $image = $img["file"]["tmp_name"];
                $extensionfinal = ".gif";

            }

            $dist = dirname( $_SERVER['DOCUMENT_ROOT'], 1 ) . DIRECTORY_SEPARATOR .
                "Frontend" . DIRECTORY_SEPARATOR .
                "Twitter-clean-code" . DIRECTORY_SEPARATOR .  
            	"res" . DIRECTORY_SEPARATOR . 
            	"site" . DIRECTORY_SEPARATOR . 
            	"img" . DIRECTORY_SEPARATOR . 
            	"tweet" . DIRECTORY_SEPARATOR . 
            	$lastInsertedId . $extensionfinal;

            if ($extensionfinal === '.jpg') {
                
                imagejpeg($image, $dist);

                imagedestroy($image);

            } elseif ($extensionfinal === '.gif') {

                move_uploaded_file($image, $dist);
                
            }

            $url = "res" . DIRECTORY_SEPARATOR . 
            "site" . DIRECTORY_SEPARATOR . 
            "img" . DIRECTORY_SEPARATOR . 
            "tweet" . DIRECTORY_SEPARATOR . 
            $lastInsertedId . $extensionfinal;

            $sql = 'UPDATE tb_tweets SET fileurl = :fileurl  WHERE idtweet = :idtweet';
                $this->db->execute($sql, [
                    'fileurl' => $url,
                    'idtweet' => $lastInsertedId,
                ]);


        }
    }

}
