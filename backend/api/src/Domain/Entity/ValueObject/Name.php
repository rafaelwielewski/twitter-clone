<?php
namespace App\Domain\Entity\ValueObject;

class Name {

    public function __construct(private string $name)
    {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getFirstName(): string
    {
        $splitedName = explode(' ', $this->name);
        return $splitedName[0];
    }

    public function getLastName(): string
    {
        $splitedName = explode(' ', $this->name);
        $positionAmount = sizeof($splitedName);
        return $splitedName[$positionAmount - 1];
    }
    
}
