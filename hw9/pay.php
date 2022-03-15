<?php

interface Payer
{
    public function sendPay(string $sum, string $userId, string $orderId): void;
    public function getResultPay(string $sum, string $userId, string $orderId): bool;
}

class PayPal implements Payer
{
    public function sendPay(string $sum, string $userId, string $orderId): void
    {
    }

    public function getResultPay(string $sum, string $userId, string $orderId): bool
    {
        return true;
    }
}

class Privat24 implements Payer
{
    public function sendPay(string $sum, string $userId, string $orderId): void
    {
    }

    public function getResultPay(string $sum, string $userId, string $orderId): bool
    {
        return true;
    }
}

class WebMoney implements Payer
{
    public function sendPay(string $sum, string $userId, string $orderId): void
    {
    }

    public function getResultPay(string $sum, string $userId, string $orderId): bool
    {
        return true;
    }
}

abstract class Pay
{
    private array $data;

    abstract public function factoryGetPayer(): Payer;

    public function saveData(string $sum, string $userId, string $orderId): bool
    {
        $pay = $this->factoryGetPayer();
        $pay->sendPay($sum, $userId, $orderId);
        if ($pay->getResultPay($sum, $userId, $orderId)) {
            $this->data['sum'] = $sum;
            $this->data['userId'] = $userId;
            $this->data['orderId'] = $orderId;
            return true;
        }
        return false;
    }

    public function getData(): array
    {
        return $this->data;
    }
}

class CreatorWebMoney extends Pay
{
    public function factoryGetPayer(): Payer
    {
        return new WebMoney();
    }
}

class CreatorPrivat24 extends Pay
{
    public function factoryGetPayer(): Payer
    {
        return new Privat24();
    }
}

class CreatorPayPal extends Pay
{
    public function factoryGetPayer(): Payer
    {
        return new PayPal();
    }
}


function sendPay(Pay $pay, string $sum, string $userId, string $orderId): array
{
    $pay->saveData($sum, $userId, $orderId);
    return $pay->getData();
}

//Send pay
$data = sendPay(new CreatorPayPal(), '100', '10', 25);
