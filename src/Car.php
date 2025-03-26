<?php

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'cars')]
class Car
{
    #[ORM\Id]
    #[ORM\Column]
    #[ORM\GeneratedValue]
    protected int|null $id = null;

    #[ORM\Column(type: 'string')]
    protected string $model;

    #[ORM\Column(options: ['default' => true])]
    protected bool $is_free = true;

    #[ORM\OneToOne(mappedBy: 'car')]
    protected Employee|null $employee = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    public function getEmployee(): ?Employee
    {
        return $this->employee;
    }

    /** @internal */
    public function setEmployee(?Employee $employee): void
    {
        $this->employee = $employee;
        echo "Setting car's employee to ", $employee?->getId() ?: 'NULL', PHP_EOL;
    }

    public function isFree(): bool
    {
        return $this->is_free;
    }

    /**
     * Set car's employee to NULL
     * Recalculate the is_free flag
     */
    public function release(): void
    {
        $this->setEmployee(null);
        $this->checkIsFree();
    }

    public function checkIsFree(): void
    {
        $this->is_free = !$this->employee;
        echo "Setting car's is_free flag to ", $this->is_free, PHP_EOL;
    }
}

