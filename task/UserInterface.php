<?php

interface UserInterface extends WorkerInterface, HumanInterface
{
    public function setGender(string $gender): void;
    public function getGender(): string;
}
