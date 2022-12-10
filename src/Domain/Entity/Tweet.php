<?php
namespace App\Domain\Entity;

use App\Domain\Entity\ValueObject\Iduser;
use App\Domain\Entity\ValueObject\Name;
use App\Domain\Entity\ValueObject\Username;
use DateTime;
use DomainException;

class Tweet {
    
    private string $tweetText;
    private string $tweetId;
    private Iduser $tweetIduser;
    private Name $tweetName;
    private Username $tweetUsername;
    private DateTime $date;

    public function setTweetText(string $tweetText)
    {
        $maxCharactersAllowed = 255;
        if (strlen($tweetText) >= $maxCharactersAllowed) throw new DomainException('The text must be less than 255 characters');
        $this->tweetText = $tweetText;
    }

    public function setDate(DateTime $date)
    {
        $this->date = $date;
    }

    public function getTweetText(): string
    {
        return $this->tweetText;
    }

    public function getDate(): string
    {
        return $this->date->format('Y-m-d H:i:s');
    }

	public function getTweetId(): string {
		return $this->tweetId;
	}

	public function setTweetId(string $tweetId): self {
		$this->tweetId = $tweetId;
		return $this;
	}

    public function setTweetIduser(Iduser $iduser)
    {
        $this->tweetIduser = $iduser;
    }
    public function getTweetIduser(): string
    {
        return $this->tweetIduser->getIduser();
    }
    public function setTweetUsername(Username $username): self {
		$this->tweetUsername = $username;
		return $this;
	}

	public function getTweetUsername(): string {
		return $this->tweetUsername->getUsername();
	}

	public function setTweetName(Name $name): self {
		$this->tweetName = $name;
		return $this;
	}

	public function getTweetName(): string {
		return $this->tweetName->getName();
	}
}


