<?php

abstract class AbstractUser
{
    private int $age;
    protected string $name;

    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    abstract public function setName(string $name): void;

    abstract public function getName(): string;
}
