<?php
namespace App\Domain\Entity;


class UserFollow {

    private $iduserCurrent;

    private $iduserFollow;

    public function __construct()
    {}


	public function getIduserCurrent() {
		return $this->iduserCurrent;
	}
	
	public function setIduserCurrent($iduserCurrent): self {
		$this->iduserCurrent = $iduserCurrent;
		return $this;
	}
	
	public function getIduserFollow() {
		return $this->iduserFollow;
	}

	public function setIduserFollow($iduserFollow): self {
		$this->iduserFollow = $iduserFollow;
		return $this;
	}
}
