<?php

class User extends AbstractUser implements UserInterface
{
    private string $gender;
    private string $colorHair;
    private string $occupation;

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function setColorHair(string $colorHair): void
    {
        $this->colorHair = $colorHair;
    }

    public function getColorHair(): string
    {
        return $this->colorHair;
    }

    public function setOccupation(string $occupation): void
    {
        $this->occupation = $occupation;
    }

    public function getOccupation(): string
    {
        return $this->occupation;
    }
}
