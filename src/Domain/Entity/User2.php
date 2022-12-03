<?php
namespace App\Domain\Entity;

use App\Domain\Entity\ValueObject\Name;

class User2 {

    private Name $name;
    
    public function setName(Name $name)
    {
        $this->name = $name;
    } 

    public function getName(): string
    {
        return $this->name->getName();
    }

    public function getFirstName(): string
    {
        return $this->name->getFirstName();
    }

    public function getLastName(): string
    {
        return $this->name->getLastName();
    }

}
