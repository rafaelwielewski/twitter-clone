<?php
namespace App\Domain\Entity\ValueObject;
use DomainException;

class Username {

    public function __construct(private string $username)
    {
        $maxUsernameCharacteres=15;
        if (strlen($username) >= $maxUsernameCharacteres) throw new DomainException('Your username cannot greater than 15 characteres');
        
    }

    public function getUsername(): string
    {
        return $this->username;
    }
    
}