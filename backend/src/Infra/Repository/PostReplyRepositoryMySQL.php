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

        $lastInsertedId = $this->db->getLastInsertedId();

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


            if (count($reply->getTweetImg()) > 0) {


                $img = $reply->getTweetImg();
    
                
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
                    "reply" . DIRECTORY_SEPARATOR . 
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
                "reply" . DIRECTORY_SEPARATOR . 
                $lastInsertedId . $extensionfinal;
    
                $sql = 'UPDATE tb_replies SET fileurl = :fileurl  WHERE idreply = :idreply';
                    $this->db->execute($sql, [
                        'fileurl' => $url,
                        'idreply' => $lastInsertedId,
                    ]);
    
    
            }
            return $total;
        
    }
}
