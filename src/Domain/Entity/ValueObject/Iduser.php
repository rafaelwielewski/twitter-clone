<?php
namespace App\Domain\Entity\ValueObject;
use DomainException;

class Iduser {

    public function __construct(private string $iduser)
    {

    }

    public function getIduser(): string
    {
        return $this->iduser;
    }
    
}