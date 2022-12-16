<?php

namespace App\Application\UseCase\PostReply;

use App\Application\UseCase\PostReply\PostReplyInput;
use App\Domain\Contract\PostReplyRepositoryContract;
use App\Domain\Entity\Tweet;
use App\Domain\Entity\ValueObject\Iduser;
use DateTime;

class PostReply {

    public function __construct(private PostReplyRepositoryContract $postReplyRepositoryContract)
    {}

    public function execute(PostReplyInput $input) 
    {
        $reply = new Tweet();
        $reply->setTweetText($input->text);
        $reply->setTweetId($input->idtweet);
        $reply->setTweetIduser(new Iduser($input->iduser));
        $reply->setDate(new DateTime());

        $this->postReplyRepositoryContract->save($reply);
    }

}
