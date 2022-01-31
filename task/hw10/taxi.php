<?php

interface GetTaxiData
{
    public function getTaxiModel(): string;
    public function getTaxiPrice(): int;
}

class Mercedes implements GetTaxiData
{

    public function getTaxiModel(): string
    {
        return 'Mercedes';
    }

    public function getTaxiPrice(): int
    {
        return 100;
    }
}

class Volkswagen implements GetTaxiData
{

    public function getTaxiModel(): string
    {
        return 'Volkswagen';
    }

    public function getTaxiPrice(): int
    {
        return 50;
    }
}

class Lada implements GetTaxiData
{

    public function getTaxiModel(): string
    {
        return 'Lada';
    }

    public function getTaxiPrice(): int
    {
        return 20;
    }
}

abstract class Delivery
{
    abstract public function createDelivery(): GetTaxiData;
}

class EconomDelivery extends Delivery
{
    public function createDelivery(): GetTaxiData
    {
        return new Lada();
    }
}

class StandartDelivery extends Delivery
{
    public function createDelivery(): GetTaxiData
    {
        return new Volkswagen();
    }
}

class LuxDelivery extends Delivery
{
    public function createDelivery(): GetTaxiData
    {
        return new Mercedes();
    }
}

function getTaxi(Delivery $deliver): GetTaxiData
{
    return $deliver->createDelivery();
}

$car = getTaxi(new LuxDelivery());

var_dump($car->getTaxiModel(), $car->getTaxiPrice());

$car1 = getTaxi(new EconomDelivery());

var_dump($car1->getTaxiModel(), $car1->getTaxiPrice());

$car2 = getTaxi(new StandartDelivery());

var_dump($car2->getTaxiModel(), $car2->getTaxiPrice());