<?php

namespace SimpleApi\Entities;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use Ramsey\Uuid\UuidInterface;

#[ORM\Entity]
#[ORM\Table(name: "welcome")]
class Welcome
{

    #[ORM\Id]
    #[ORM\Column(type: "uuid", unique: true)]
    #[ORM\GeneratedValue(strategy: "CUSTOM")]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    protected UuidInterface | string $id;

    #[ORM\Column(type: 'string')]
    protected string $name;

    public function getId(): string
    {
        return $this->id;
    }
    
    public function getName(): string
    {
        return $this->name;
    }
    
    public function setId(string $id): Welcome
    {
        $this->id = $id;
        return $this;
    }

    public function setName(string $name): Welcome
    {
        $this->name = $name;
        return $this;
    }
    
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName()
        ];    
    }
}