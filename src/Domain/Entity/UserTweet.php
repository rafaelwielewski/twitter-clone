<?php
namespace App\Domain\Entity;

use App\Domain\Entity\ValueObject\Name;
use App\Domain\Entity\ValueObject\Username;

class UserTweet {
    
    public function __construct(
    private Name $NameUser,
    private Username $UsernameUser,
    private Iduser $iduserUser
    )
    {}

    public function getTweetNameUser()
    {
        return $this->NameUser->getName();
    }
    public function getTweetUsernameUser()
    {
        return $this->UsernameUser->getUsername();
    }

}
