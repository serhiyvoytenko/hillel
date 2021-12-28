<?php

interface WorkerInterface
{
    public function setOccupation(string $occupation): void;
    public function getOccupation():string;
}