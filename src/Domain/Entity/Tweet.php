<?php
namespace App\Domain\Entity;

use DateTime;
use DomainException;

class Tweet {
    
    private string $text;
    private DateTime $date;
    private UserTweet $userTweet;

    public function setText(string $text)
    {
        $maxCharactersAllowed = 255;
        if (strlen($text) >= $maxCharactersAllowed) throw new DomainException('The text must be less than 255 characters');
        $this->text = $text;
    }

    public function setDate(DateTime $date)
    {
        $this->date = $date;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getDate(): string
    {
        return $this->date->format('Y-m-d H:i:s');
    }

    public function setUserTweet(UserTweet $userTweet)
    {
        $this->userTweet = $userTweet;
    }

    public function getTweetNameUser(): string
    {
        return $this->userTweet->getTweetNameUser();
    }
    public function getTweetUsernameUser(): string
    {
        return $this->userTweet->getTweetUsernameUser();
    }

}
