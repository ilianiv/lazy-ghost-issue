<?php

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'employees')]
class Employee
{
    #[ORM\Id]
    #[ORM\Column]
    #[ORM\GeneratedValue]
    protected int|null $id = null;

    #[ORM\Column(type: 'string')]
    protected string $name;

    #[ORM\OneToOne(inversedBy: 'employee')]
    protected Car|null $car = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(Car $car): void
    {
        $this->car = $car;
        $this->car->setEmployee($this);
    }

    public function removeCar(): void
    {
        $this->car?->release();
        $this->car = null;
    }
}
