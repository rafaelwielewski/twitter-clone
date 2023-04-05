<?php
namespace App\Domain\Entity\ValueObject;
use DomainException;

class Password {

    public function __construct(private string $password)
    {
        $pattern = '/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[\w$@]{6,}$/'; //has at least one number, at least one lowercase letter, at least one capital letter, from 8 to 36 characters
        $isValidPassword = preg_match($pattern, $password) ? true : false;
        if ($isValidPassword === false) throw new DomainException('Your password must have at least one number, one lowercase letter, one capital letter, from 8 to 36 characters');
        
    }

    public function getPassword(): string
    {
        return $this->password;
    }
    
}