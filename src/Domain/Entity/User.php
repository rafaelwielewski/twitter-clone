<?php
namespace App\Domain\Entity;

use App\Domain\Entity\ValueObject\Name;
use App\Domain\Entity\ValueObject\Password;
use App\Domain\Entity\ValueObject\Username;

class User {

    private Name $name;
    private Username $username;
    private Password $password;
    private $iduser;
    private $profileImg;
    private $joined;
    private $location;
    private $website;
    private $bio;
    private $following;
    private $followers;


    public function __construct()
    {}

    public function setName(Name $name)
    {
        $this->name = $name;
    }
    public function getName(): string
    {
        return $this->name->getName();
    }
    public function setUsername(Username $username)
    {
        $this->username = $username;
    }
    public function getUsername(): string
    {
        return $this->username->getUsername();
    }
    public function setPassword(Password $password)
    {
        $this->password = $password;
    }
    public function getPassword(): string
    {
        return $this->password->getPassword();
    }
	
	public function getIduser() {
		return $this->iduser;
	}
	
	public function setIduser($iduser): self {
		$this->iduser = $iduser;
		return $this;
	}
	
	
	public function getProfileImg() {
		return $this->profileImg;
	}

	public function setProfileImg($profileImg): self {
		$this->profileImg = $profileImg;
		return $this;
	}
	
	
	public function getJoined() {
		return $this->joined;
	}
	
	public function setJoined($joined): self {
		$this->joined = $joined;
		return $this;
	}
	
	
	public function getLocation() {
		return $this->location;
	}

	public function setLocation($location): self {
		$this->location = $location;
		return $this;
	}
	
	
	public function getWebsite() {
		return $this->website;
	}
	

	public function setWebsite($website): self {
		$this->website = $website;
		return $this;
	}
	
	
	public function getBio() {
		return $this->bio;
	}
	
	public function setBio($bio): self {
		$this->bio = $bio;
		return $this;
	}
	
	
	public function getFollowing() {
		return $this->following;
	}
	
	public function setFollowing($following): self {
		$this->following = $following;
		return $this;
	}
	
	
	public function getFollowers() {
		return $this->followers;
	}

	public function setFollowers($followers): self {
		$this->followers = $followers;
		return $this;
	}
}
